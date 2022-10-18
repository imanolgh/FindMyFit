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
            $inner_shirt_row = Images::where('user_id', '=', $user) -> where('type', '=', "Innerwear") -> inRandomOrder() -> first();
            $outer_wear_row = Images::where('user_id', '=', $user) -> where('type', '=', "Outterwear") -> inRandomOrder() -> first();
            $pants_row = Images::where('user_id', '=', $user) -> where('type', '=', "Bottom") -> inRandomOrder() -> first();
            $data = array(
                'inner_shirt_name' => $inner_shirt_row -> user_name,
                'outer_wear_name' => $outer_wear_row -> user_name,
                'pants_name' => $pants_row -> user_name,
                'inner_shirt_id' => $inner_shirt_row -> id,
                'outer_wear_id' => $outer_wear_row -> id,
                'pants_id' => $pants_row -> id, 
            );
        }else{
            $data = array(
                'inner shirt_name' => "white tshirt",
                'outer wear_name' => "leather jacket",
                'pants_name' => "blue jeans"
                );
        }
        return view('generated_outfit')->with(compact('data'));
    }

    //get weather function
    public function get_weather_message($temp){
        if($temp>80){
            return "it will be very hot today";
        }else if($temp>70){
            return "the weather is nice outside";
        }else if($temp>60){
            return "it will be a slightly chilly day";
        }else if($temp > 31){
            return "today is very cold";
        }else if($temp < 32){
            return "it is freezing today, make sure to stay warm";
        }
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
