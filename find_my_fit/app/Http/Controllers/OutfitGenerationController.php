<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class OutfitGenerationController extends Controller
{
    

    //basic outfit generator
    public function basic_outfit(){
        $temp = 70;
        if(Auth::check()){
            $data = array(
                'inner shirt' => DB::select('SELECT a FROM b ORDER BY RAND() LIMIT 1 WHERE c AND D'),
                'outer wear' => DB::select('SELECT a FROM b ORDER BY RAND() LIMIT 1WHERE c AND D'),
                'pants' => DB::select('SELECT a FROM b ORDER BY RAND() LIMIT 1WHERE c AND D'),
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
