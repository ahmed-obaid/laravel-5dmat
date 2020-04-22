<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\controller;
use App\models\comment;
class home extends controller
{


     public function index()
    {
       $comments=comment::orderby('id','desc')->paginate(20);
       return view ('back-end.home',compact('comments'));
    }
}
