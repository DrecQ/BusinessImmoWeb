<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index()
    {
        $properties = Property::orderBy('created_at', 'DESC')->available()->recent()->limit(6)->get();

        return view('home', ['properties' => $properties]);
    }
}
