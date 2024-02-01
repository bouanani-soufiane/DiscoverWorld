<?php

namespace App\Http\Controllers;

use App\Models\Aventure;
use App\Models\Continent;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $continents = Continent::all();
        $aventures = Aventure::paginate(5);
        return view('home', compact('continents','aventures'));
    }
}
