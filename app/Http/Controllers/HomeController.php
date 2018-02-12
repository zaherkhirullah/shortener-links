<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\link;
use App\Http\Models\file;

class HomeController extends Controller
{
    
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index()
    {
        return view('home.home');
    }
    public function rates()
    {
        return view('home.rates');
    }

    public function llink($slug)
    {
        $link = link::where('slug', $slug)->first();
        return  $link ; 
    }
    public function flink($title)
    {
        $file = file::where('slug', $title)->first();
        return  $file ; 
    }
    
    //  link
    public function visitLink($slug)
    { 
        $link = $this->llink($slug);
        return view('home.captcha',compact('link'));
    }
   
   

    public function Fc_visitLink($slug)
    {
        $link = $this->llink($slug);
        return view('home.Fcaptcha',compact('link'));
    }

    public function getLink(Request $request)
    {
        $link = $this->llink($request->slug);
        return view('home.link',compact('link'));
    }
    
    public function goToLink(Request $request)
    {   
        $link = $this->llink($request->slug);
        return redirect($link->url);
    }
    // file
    public function visitFile($title)
    {   $file =$this->flink($title);
        return view('home.captcha',compact('file'));
    }
    
    public function Fc_visitFile($title)
    {   
        $file =$this->flink($title);
        return view('home.Fcaptcha',compact('file'));
    }
    public function getFile($file)
    {
        $file =$this->flink($title);
        return view('home.file',compact('file'));
    }
    public function goToFile($file)
    {
        $file =$this->flink($title);
        return view('home.file',compact('file'));
    }
}
