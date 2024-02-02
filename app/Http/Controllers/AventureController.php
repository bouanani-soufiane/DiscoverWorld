<?php

namespace App\Http\Controllers;

use App\Models\Aventure;
use App\Models\Continent;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class AventureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $continents = Cache::remember('continents', now()->addHours(1), function () {
            return Continent::all();
        });

        $aventures = Cache::remember(
            'aventures_' . implode('_', request(['search', 'destination', 'sort'])),
            now()->addMinutes(10),
            function () {
                return Aventure::filter(request(['search', 'destination', 'sort']))->get();
            }
        );

        return view('aventures', compact('aventures', 'continents'));
    }
    public function showSingle($id)
    {
        $aventure = Aventure::with('images')->find($id);

        if (!$aventure) {
            abort(404);
        }

        return view('aventure-single', compact('aventure'));
    }
    public function showByContinent($continent_id)
    {
        $aventures = Aventure::where('continent_id', $continent_id)->with('images')->get();

        if (!$aventures) {
            abort(404);
        }

        return view('aventure-continent', compact('aventures'));
    }

    public function create()
    {
        $continents = Continent::all();
        return view('partials.aventure',compact('continents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $aventure = new Aventure();
        $aventure->titre = $request->titre;
        $aventure->aventureDescription = $request->aventureDescription;
        $aventure->continent_id = $request->continent_id;
        $aventure->consiel = $request->consiel;
        $aventure->user_id = Auth::user()->id;
        $aventure->save();

        if ($request->hasFile('images')) {
            foreach ($request->images as $uploadedImage) {
                $image = new Image();
                $image->aventure_id = $aventure->id;
                $image->text = $uploadedImage->store('images', 'public');

                $image->save();
            }
        }

        return redirect()->route('aventure.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Aventure $aventure)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aventure $aventure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aventure $aventure)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aventure $aventure)
    {
        //
    }
}
