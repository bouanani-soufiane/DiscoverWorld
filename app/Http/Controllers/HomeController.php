<?php

namespace App\Http\Controllers;

use App\Models\Aventure;
use App\Models\Continent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $continents = Continent::all();
        $aventures = Aventure::paginate(5);
        $usersCount = User::count();
        $continentWithMostAdventures = $this->continentWithMostAdventures();





        return view('home', compact('continents','aventures','usersCount','continentWithMostAdventures'));
    }
    public static function continentWithMostAdventures()
    {
        $result = DB::select("
        SELECT continents.*, COUNT(aventures.id) as adventure_count
        FROM continents
        LEFT JOIN aventures ON continents.id = aventures.continent_id
        GROUP BY continents.id
        ORDER BY adventure_count DESC
        LIMIT 1");

        return count($result) > 0 ? (object) $result[0] : null;
    }

}
