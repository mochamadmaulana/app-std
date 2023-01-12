<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceMenuController extends Controller
{
    public function index()
    {
        return view('service-menu');
    }
}
