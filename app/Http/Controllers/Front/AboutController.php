<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){

        $abouts=About::all();
        return view('front.about')->with('abouts',$abouts);

    }
}
