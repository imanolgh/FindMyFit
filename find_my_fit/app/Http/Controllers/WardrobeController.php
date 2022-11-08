<?php

namespace App\Http\Controllers;
use App\Models\Images;
use Illuminate\Support\Facades\Response;
use Image;

use Illuminate\Http\Request;

class WardrobeController extends Controller
{
    function index()
    {
     $data = Images::latest()->paginate(5);
     return view('wardrobe', compact('data'))
       ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    function insert_image(Request $request)
    {
     $request->validate([
      'user_name'  => 'required',
      'user_image' => 'required|image|max:65536'
     ]);

     $image_file = $request->user_image;

     $image = Image::make($image_file);

     Response::make($image->encode('jpeg'));

     $form_data = array(
      'user_name'  => $request->user_name,
      'user_image' => $image
     );

     Images::create($form_data);

     return redirect()->back()->with('success', 'Image store in database successfully');
    }

    function fetch_image($image_id)
    {
     $image = Images::findOrFail($image_id);

     $image_file = Image::make($image->user_image);

     $response = Response::make($image_file->encode('jpeg'));

     $response->header('Content-Type', 'image/jpeg');

     return $response;
    }
}
