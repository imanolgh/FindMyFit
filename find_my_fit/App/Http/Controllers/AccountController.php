<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Images;
use App\Models\Outfit;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use Image;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    function index()
    {
     $data = Outfit::latest()->paginate(5);
     return view('account', compact('data'))
       ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    function fetch_inner($row)
    {
        $user = Auth::id();
        $Outfit = Outfit::findOrFail($row);
        $belongsTo = Outfit::where($Outfit->user_id, $user);
        dd($belongsTo);
        $image_file = Outfit::make($Outfit->innerwear);

        $response = Response::make($image_file->encode('jpeg'));

        $response->header('Content-Type', 'image/jpeg');

        return $response;
    }

    function fetch_outter($row)
    {
     $user = Auth::id();
     $Outfit = Outfit::findOrFail($row);
     $belongsTo = Outfit::where($Outfit->user_id, $user);
     $image_file = Outfit::make($Outfit->outter);

     $response = Response::make($image_file->encode('jpeg'));

     $response->header('Content-Type', 'image/jpeg');

     return $response;
    }

    function fetch_bottom($row)
    {
     $user = Auth::id();
     $Outfit = Outfit::findOrFail($row);
     $belongsTo = Outfit::where($Outfit->user_id, $user);
     $image_file = Outfit::make($Outfit->bottom);

     $response = Response::make($image_file->encode('jpeg'));

     $response->header('Content-Type', 'image/jpeg');

     return $response;
    }
}