<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function aboutUsIndex()
    {
        return view('home.aboutus');
    }

    public function howItWorksIndex()
    {
        return view('home.howitworks');
    }

    public function whySaveProgresIndex()
    {
        return view('home.whysaveprogress');
    }

}
