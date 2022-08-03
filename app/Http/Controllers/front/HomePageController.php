<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    //
    public function index()
    {
        return view('front.homePage');
    }

    public function resume()
    {
        return view('front.resume');
    }
    public function project()
    {
        return view('front.project');
    }

    public function contact()
    {
        return view('front.contact');
    }
    public function singleProject()
    {
        return view('front.singleProject');
    }
}
