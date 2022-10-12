<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WardrobeController extends Controller
{
    public function index() {
        return view('wardrobe');
    }
}
