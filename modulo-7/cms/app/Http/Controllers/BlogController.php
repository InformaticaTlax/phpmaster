<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ Blog;

class BlogController extends Controller
{
    //
    public function traerBlog(){

        $blog = Blog::all();

        return view("paginas.blog",array("blog"=>$blog));
        
    } 
}
