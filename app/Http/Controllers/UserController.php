<?php

namespace App\Http\Controllers;

use App\Models\Aventure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $userId = Auth::user()->id;
        $aventures = Aventure::where('user_id', $userId)->with('images')->get();

        return view('profile',compact('aventures'));
    }
}
