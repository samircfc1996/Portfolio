<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function index(){
        $portfolios=Portfolio::all();
        return view('front.work')->with('portfolios',$portfolios);
    }

    public function about(string $slug){
        $portfolio=Portfolio::with('photos')->where('slug',$slug)->firstOrFail();
        return view('front.work_about')->with('portfolio',$portfolio);
    }
}
