<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Contracts\View\View;

class forntendController extends Controller
{
   public function index(): View{
      $slider =  Slider::where('status',1)->get();
        return view('frontend.home.index',compact('slider'));
    }
}
