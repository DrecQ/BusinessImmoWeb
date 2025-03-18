<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Weather;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function __construct(private Weather $weather)
    {

    }

    public function index()
    {
        dd(app(Weather::class));

        $properties = Property::orderBy('created_at', 'DESC')->available()->recent()->limit(6)->get();

        /** @var User $user */
        $user = User::first();
        $user -> password = '1111';
        $user->syncChanges();

    

        return view('home', ['properties' => $properties]);
    }
}
