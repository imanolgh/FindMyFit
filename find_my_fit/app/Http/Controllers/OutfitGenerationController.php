<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Image;
use App\Models\Images;
use Illuminate\Support\Facades\Response;

class OutfitGenerationController extends Controller
{
    

    //basic outfit generator
    public function basic_outfit(){
        $temp = 70;
        if(Auth::check()){
            $user = Auth::id();
            $data = array(
                'inner shirt' => Images::where('id', '=', $user) -> where('type', '=', "Innerwear") -> select('user_name') -> inRandomOrder() -> first(),
                'outer wear' => Images::where('id', '=', $user) -> where('type', '=', "Outterwear") -> select('user_name') -> inRandomOrder() -> first(),
                'pants' => Images::where('id', '=', $user) -> where('type', '=', "Bottom") -> select('user_name') -> inRandomOrder() -> first(),
            );
        }else{
            $data = array(
                'inner shirt' => "white tshirt",
                'outer wear' => "leather jacket",
                'pants' => "blue jeans"
                );
        }
        return view('generated_outfit')->with(compact('data'));
    }

    //basic outfit generator with user
    public function basic_outfit_user($temp, $id){
        $outer_shirt = DB::select('SELECT a FROM b ORDER BY RAND() LIMIT 1 WHERE c AND D');
        $inner_shirt = DB::select('SELECT a FROM b ORDER BY RAND() LIMIT 1WHERE c AND D');
        $pants = DB::select('SELECT a FROM b ORDER BY RAND() LIMIT 1WHERE c AND D');


        $data = array(
        'inner shirt' => $inner_shirt,
        'outer wear' => $outer_shirt,
        'pants' => $pants
        );
        return view('generated_outfit')->with(compact('data'));
    }
}
