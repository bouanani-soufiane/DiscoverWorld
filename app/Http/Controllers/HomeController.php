<?php

namespace App\Http\Controllers;

use App\Models\Continent;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $continents = Continent::all();
        return view('home', compact('continents'));
    }
}
