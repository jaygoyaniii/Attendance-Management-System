<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        echo $img_url = public_path()."/AdminCss/assets/img/layouts/attendance.jpeg";

        // $date2 = date('Y-m-d', strtotime('-7 days') ) ."</br>";
        // echo $date = date('Y-m-d');
        // echo $date2;
    }
}
