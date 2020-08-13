<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsfeedController extends Controller
{
    public function index(){
        return View("newsfeed.index");
    }
}
