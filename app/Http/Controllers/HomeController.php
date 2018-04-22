<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // session()->forget('area');

        $areas = Area::get()->toTree();

        return view('home', compact('areas'));
    }
}
