<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Image;
use App\Models\Images;
use App\Models\Outfit;

use Illuminate\Support\Facades\Response;

class OutfitGenerationController extends Controller
{


    //basic outfit generator
    public function basic_outfit(){
        if(Auth::check()){
            $user = Auth::id();
            $temp = DB::table('weather') -> where('user_id', '=', $user) -> latest() -> first() -> temp;
            $weather_msg = OutfitGenerationController::get_weather_message(intval($temp));
            $inner_shirt = Images::where('user_id', '=', $user) -> where('type', '=', "Innerwear") -> inRandomOrder()->get();
            $outer_wear = Images::where('user_id', '=', $user) -> where('type', '=', "Outterwear") -> inRandomOrder()->get();
            $pants = Images::where('user_id', '=', $user) -> where('type', '=', "Bottom") -> inRandomOrder()->get();
            $shoes = Images::where('user_id', '=', $user) -> where('type', '=', "Shoes") -> inRandomOrder()->get();

            $tries = 0;

            if($temp > 70){
                $outfit_descriptions = array(
                    'inner_shirt_descriptions' => OutfitGenerationController::getDescriptions($inner_shirt -> value('color')),
                    'pants_descriptions' => OutfitGenerationController::getDescriptions($pants -> value('color')),
                    'shoes_descriptions' => OutfitGenerationController::getDescriptions($shoes -> value('color')),
                ) ;
                
                while(!OutfitGenerationController::is_neutral_outfit($outfit_descriptions)){
                    $inner_shirt = Images::where('user_id', '=', $user) -> where('type', '=', "Innerwear") -> inRandomOrder()->get();
                    $pants = Images::where('user_id', '=', $user) -> where('type', '=', "Bottom") -> inRandomOrder()->get();
                    $shoes = Images::where('user_id', '=', $user) -> where('type', '=', "Shoes") -> inRandomOrder()->get();
                    $outfit_descriptions = array(
                        'inner_shirt_descriptions' => OutfitGenerationController::getDescriptions($inner_shirt -> value('color')),
                        'pants_descriptions' => OutfitGenerationController::getDescriptions($pants -> value('color')),
                        'shoes_descriptions' => OutfitGenerationController::getDescriptions($shoes -> value('color')),
                    ) ;
                    $tries = $tries + 1;
                    if($tries > 10){
                        break;
                    }
                }

                $outfit_data = array(
                    'inner_shirt_row' => $inner_shirt -> first(),
                    'pants_row' => $pants -> first(),
                    'shoes_row' => $shoes -> first(),
                );
                
            }else{
                $outfit_descriptions = array(
                    'inner_shirt_descriptions' => OutfitGenerationController::getDescriptions($inner_shirt -> value('color')),
                    'outer_wear_descriptions' => OutfitGenerationController::getDescriptions($outer_wear -> value('color')),
                    'pants_descriptions' => OutfitGenerationController::getDescriptions($pants -> value('color')),
                    'shoes_descriptions' => OutfitGenerationController::getDescriptions($shoes -> value('color')),
                ) ;

                while(!OutfitGenerationController::is_neutral_outfit($outfit_descriptions)){
                    $inner_shirt = Images::where('user_id', '=', $user) -> where('type', '=', "Innerwear") -> inRandomOrder()->get();
                    $outer_wear = Images::where('user_id', '=', $user) -> where('type', '=', "Outterwear") -> inRandomOrder()->get();
                    $pants = Images::where('user_id', '=', $user) -> where('type', '=', "Bottom") -> inRandomOrder()->get();
                    $shoes = Images::where('user_id', '=', $user) -> where('type', '=', "Shoes") -> inRandomOrder()->get();
                    $outfit_descriptions = array(
                        'inner_shirt_descriptions' => OutfitGenerationController::getDescriptions($inner_shirt -> value('color')),
                        'outer_wear_descriptions' => OutfitGenerationController::getDescriptions($outer_wear -> value('color')),
                        'pants_descriptions' => OutfitGenerationController::getDescriptions($pants -> value('color')),
                        'shoes_descriptions' => OutfitGenerationController::getDescriptions($shoes -> value('color')),
                    ) ;
                    $tries = $tries + 1;
                    if($tries > 10){
                        break;
                    }
                }

                $outfit_data = array(
                    'inner_shirt_row' => $inner_shirt -> first(),
                    'outer_wear_row' => $outer_wear -> first() ,
                    'pants_row' => $pants -> first(),
                    'shoes_row' => $shoes -> first(),
                );

                
            }
        
            return view('generated_outfit')->with(compact('outfit_data')) -> with(compact('weather_msg'))->with(compact('outfit_descriptions'));
        }
    }

    public function is_neutral_outfit($outfits_desc){
        $bright = 0;
        $neutral = 0;
        $cool_dark = 0;
        foreach($outfits_desc as $item_desc){
            if($item_desc[1] == "NEUTRAL"){
                $neutral = $neutral + 1;
            }elseif($item_desc[0] == "COOL" and $item_desc[1] == "DARK"){
                $cool_dark = $cool_dark + 1;
            }elseif($item_desc[1] == "BRIGHT"){
                $bright = $bright + 1;
            }
        }
        if($neutral == 0 or $bright >1 or($cool_dark > 1)){
            return false;
        }else{
            return true;
        }
    }

    public function get_all_values($color){
        list($r, $g, $b) = sscanf($color, "#%02x%02x%02x");
        $hsv = OutfitGenerationController::RGBtoHSV($r, $g, $b);
        return array($r, $g, $b, $hsv, OutfitGenerationController::HSVtoDescriptions($hsv[0], $hsv[1], $hsv[2]));
    }

    public function getDescriptions($color){
        list($r, $g, $b) = sscanf($color, "#%02x%02x%02x");
        $hsv = OutfitGenerationController::RGBtoHSV($r, $g, $b);
        return OutfitGenerationController::HSVtoDescriptions($hsv[0], $hsv[1], $hsv[2]);
    }    

    public function HSVtoDescriptions($H, $S, $V){

        $hue = "";
        $saturation = "";
        $value = "";
        $tone = "";
        if ($H >80 and $H < 290){
            $hue = "COOL";
        }else{
            $hue = "WARM";
        }

        if($S < 10){
            $saturation = "GRAY";
        }elseif($S < 40){
            $saturation = "VERY_FADED";
        }elseif($S < 62){
            $saturation = "FADED";
        }elseif($S < 87){
            $saturation = "SATURATED";
        }else{
            $saturation = "VERY_SATURATED";
        }

        if($V < 14){
            $value = "BLACK";
        }elseif($V < 38){
            $value = "VERY_DARK";
        }elseif($V < 62){
            $value = "DARK";
        }elseif($V < 87){
            $value = "BRIGHT";
        }else{
            $value = "VERY_BRIGHT";
        }
        
        if($saturation == "GRAY" or $saturation == "VERY_FADED" or $value == "BLACK" or ($value == "VERY_DARK" and ($saturation == "FADED" or $saturation == "SATURATED" or $saturation == "VERY_SATURATED"))){
            $tone = "NEUTRAL";
        }elseif(($value == "DARK" and $saturation == "VERY_SATURATED") or ($value == "BRIGHT" and ($saturation == "SATURATED" or $saturation == "VERY_SATURATED")) or ($value == "VERY_BRIGHT" and ($saturation == "FADED" or $saturation == "SATURATED" or $saturation == "VERY_SATURATED"))){
            $tone = "BRIGHT";
        }else{
            $tone = "DARK";
        }

        return array($hue, $tone);
    }

    function RGBtoHSV($R, $G, $B)    // RGB values:    0-255, 0-255, 0-255
    {                                // HSV values:    0-360, 0-100, 0-100
        // Convert the RGB byte-values to percentages
        $R = ($R / 255);
        $G = ($G / 255);
        $B = ($B / 255);
        
        // Calculate a few basic values, the maximum value of R,G,B, the
        //   minimum value, and the difference of the two (chroma).
        $maxRGB = max($R, $G, $B);
        $minRGB = min($R, $G, $B);
        $chroma = $maxRGB - $minRGB;

        // Value (also called Brightness) is the easiest component to calculate,
        //   and is simply the highest value among the R,G,B components.
        // We multiply by 100 to turn the decimal into a readable percent value.
        $computedV = 100 * $maxRGB;

        // Special case if hueless (equal parts RGB make black, white, or grays)
        // Note that Hue is technically undefined when chroma is zero, as
        //   attempting to calculate it would cause division by zero (see
        //   below), so most applications simply substitute a Hue of zero.
        // Saturation will always be zero in this case, see below for details.
        if ($chroma == 0)
            return array(0, 0, $computedV);

        // Saturation is also simple to compute, and is simply the chroma
        //   over the Value (or Brightness)
        // Again, multiplied by 100 to get a percentage.
        $computedS = 100 * ($chroma / $maxRGB);

        // Calculate Hue component
        // Hue is calculated on the "chromacity plane", which is represented
        //   as a 2D hexagon, divided into six 60-degree sectors. We calculate
        //   the bisecting angle as a value 0 <= x < 6, that represents which
        //   portion of which sector the line falls on.
        if ($R == $minRGB)
            $h = 3 - (($G - $B) / $chroma);
        elseif ($B == $minRGB)
            $h = 1 - (($R - $G) / $chroma);
        else // $G == $minRGB
            $h = 5 - (($B - $R) / $chroma);

        // After we have the sector position, we multiply it by the size of
        //   each sector's arc (60 degrees) to obtain the angle in degrees.
        $computedH = 60 * $h;

        return array($computedH, $computedS, $computedV);
    }


    //get weather function
    public function get_weather_message($temp){
        if($temp>75){
            return "it will be very hot today, make sure to stay hydrated";
        }else if($temp>65){
            return "the weather is nice outside";
        }else if($temp>55){
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



    function insert_outfit(Request $request)
    {
    $outfit = $request->outfit_data;
    // dd($outfit);
   
    $innerwear = Images::where('id', $outfit[0])->firstOrFail();
    $outterwear = Images::where('id', $outfit[1])->firstOrFail();
    $bottom = Images::where('id', $outfit[2])->firstOrFail();

    $innerwear_id = $innerwear->id;
    $outterwear_id = $outterwear->id;
    $bottom_id = $bottom->id;
   
    $user = Auth::user(); // get currently logged in user
     $user_id = $user->id; // get the user's id
     $form_data = array(
      'innerwear'  => $innerwear_id,
      'outterwear' => $outterwear_id,
      'bottom' => $bottom_id,
    //   'shoes'=> $shoes->user_image,
      'user_id' => $user_id
     );
     
     Outfit::create($form_data);
     $data = Outfit::latest()->paginate(5);

    
    //  $user_email = $user->email;
    // $user_name = $user->name
    return view('account', compact('data'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
   
   
    }

}
