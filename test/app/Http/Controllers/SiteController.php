<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;
class SiteController extends Controller
{
    public function home(){

        $latestPublication = Publication::orderBy('created_at', 'desc')->first();
            return view('home', [
                'date' => now(),
                'latestPublication' =>$latestPublication
            ]);
        
    }
    public function about(){
        return view('about_us');
    }
}
