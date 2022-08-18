<?php


namespace App\Helpers;


use AshAllenDesign\ShortURL\Classes\Builder;
use AshAllenDesign\ShortURL\Models\ShortURL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Route;
use App\Models\City; 

class Helpers
{
    public static function createShortUrl($url,$source){
        if (Auth::check()){
            $result = DB::table('short_urls')
                ->where('user_id',Auth::id())
                ->where('source',$source)
                ->where('destination_url',$url)
                ->get();

            if (count($result) > 0){
                return $result[0]->default_short_url;
            }
        }

        $urlObject = new Builder();
        $shortURLObject = $urlObject->destinationUrl($url)->make();

        if (Auth::check()){
            DB::table('short_urls')
                ->where('id', $shortURLObject->id)
                ->update([
                    'user_id' => Auth::id(),
                    'source' => $source
                ]);
        }

        $shortURL = $shortURLObject->default_short_url;
        return $shortURL;
    }

    public static function city_id()
    {
        //dd(session()->all());
        $city_name=Route::input('subdomain');
       if($city_name)
       {
        Session::put('subdomain', $city_name);
       }
       else{
        $city_name = Session::get('subdomain');
       }
        $city_id = City::where('name',$city_name)->first();
        $city_id = $city_id->id;
        return $city_id;
    }

}
