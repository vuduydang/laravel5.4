<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        dd(Storage::disk('local')->listContents('zip-downloads', true)) ;
    }
}
