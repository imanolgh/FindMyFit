<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Images;
use App\Models\Outfit;
use App\Models\User;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use Image;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    function index()
    {
        $user = Auth::user(); // get currently logged in user
        $user_id = $user->id; // get the user's id
  
       $data = Outfit::where('user_id', $user_id)->latest()->paginate(5);
    //  $data = Outfit::latest()->paginate(5);
     return view('account', compact('data'))
       ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    function fetch_inner($innerwear)
    {
        $user = Auth::user(); // get currently logged in user
        $user_id = $user->id; // get the user's id

        $innerwear_image = Images::where('id', $innerwear)
        ->where('user_id', $user_id)
        ->firstOrFail();
       
        $image_file = Image::make($innerwear_image->user_image);

        $response = Response::make($image_file->encode('jpeg'));

        $response->header('Content-Type', 'image/jpeg');

        return $response;
    }

    function fetch_outter($outterwear)
    {
        $user = Auth::user(); // get currently logged in user
        $user_id = $user->id; // get the user's id

        $outterwear_image = Images::where('id', $outterwear)
        ->where('user_id', $user_id)
        ->firstOrFail();
       
        $image_file = Image::make($outterwear_image->user_image);

        $response = Response::make($image_file->encode('jpeg'));

        $response->header('Content-Type', 'image/jpeg');

        return $response;
    }

    function fetch_bottom($bottom)
    {
        $user = Auth::user(); // get currently logged in user
        $user_id = $user->id; // get the user's id

        $bottom_image = Images::where('id', $bottom)
        ->where('user_id', $user_id)
        ->firstOrFail();
       
        $image_file = Image::make($bottom_image->user_image);

        $response = Response::make($image_file->encode('jpeg'));

        $response->header('Content-Type', 'image/jpeg');

        return $response;
    }

    function fetch_shoes($shoes)
    {
        $user = Auth::user(); // get currently logged in user
        $user_id = $user->id; // get the user's id

        $shoes_image = Images::where('id', $shoes)
        ->where('user_id', $user_id)
        ->firstOrFail();
       
        $image_file = Image::make($shoes_image->user_image);

        $response = Response::make($image_file->encode('jpeg'));

        $response->header('Content-Type', 'image/jpeg');

        return $response;
    }

    function get_social_page()
    {
        $user = Auth::id();
        $social_data = User::where('id', '!=', $user) ->get();

        return view('social')->with(compact('social_data'));
    }
}