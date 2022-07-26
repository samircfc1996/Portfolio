<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function  index(){
        $portfolios=Portfolio::all();
        return view('front.home')->with('portfolios',$portfolios);
    }
}
