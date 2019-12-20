<?php

namespace App\Http\Controllers\user;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\banner;
use Illuminate\Http\Request;

class listController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
       
        return view('user.listing.index');
    }

    
}
