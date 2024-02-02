<?php

namespace App\Http\Controllers;

use App\Models\Aventure;
use App\Models\Continent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $continents = Cache::remember('continents', now()->addHours(1), function () {
            return Continent::all();
        });

        $sortOption = $request->input('sort');
        $countryFilter = $request->input('country');
        $adventures = Cache::remember(
            'adventures_' . implode('_', [$sortOption, $countryFilter]),
            now()->addMinutes(10),
            function () use ($sortOption, $countryFilter) {
                $adventuresQuery = Aventure::query();

                if ($sortOption === 'oldest') {
                    $adventuresQuery->orderBy('created_at');
                } elseif ($sortOption === 'newest') {
                    $adventuresQuery->orderByDesc('created_at');
                }

                // Filter by country
                if ($countryFilter) {
                    $adventuresQuery->whereHas('continent', function ($query) use ($countryFilter) {
                        $query->where('nameContinent', $countryFilter);
                    });
                }

                return $adventuresQuery->get();
            }
        );

        $usersCount = Cache::remember('users_count', now()->addHours(1), function () {
            return User::count();
        });

        $continentWithMostAdventures = $this->continentWithMostAdventures();

        return view('home', compact('continents', 'adventures', 'usersCount', 'continentWithMostAdventures'));
    }


    public static function continentWithMostAdventures()
    {
        $result = DB::select("SELECT continents.*, COUNT(aventures.id) as adventure_count FROM continents LEFT JOIN aventures ON continents.id = aventures.continent_id GROUP BY continents.id ORDER BY adventure_count DESC LIMIT 1");
        return count($result) > 0 ? (object) $result[0] : null;
    }

}
