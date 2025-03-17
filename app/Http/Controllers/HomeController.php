<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index()
    {
        $properties = Property::orderBy('created_at', 'DESC')->available()->recent()->limit(6)->get();

        $user = User::first();
        $user -> password = '1111';

    

        return view('home', ['properties' => $properties]);
    }
}
