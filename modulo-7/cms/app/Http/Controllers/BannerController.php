<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    //
    public function index()
    {

        $banner = Banner::all();
        $blog = Blog::all();

        return view("paginas.banner", array("banner" => $banner, "blog" => $blog));
    }
}
