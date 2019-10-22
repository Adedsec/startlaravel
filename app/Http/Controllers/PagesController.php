<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $persons = [
            ['name' => 'aref', 'family' => 'maddah'],
            ['name' => 'alireza', 'family' => 'RJ']
        ];
        return view('welcome', compact('persons'));
    }

    public function About()
    {
        return view('About');
    }
}
