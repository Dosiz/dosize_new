<?php


namespace App\Helpers;


use AshAllenDesign\ShortURL\Classes\Builder;
use AshAllenDesign\ShortURL\Models\ShortURL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Route;
use App\Models\City; 
use App\Models\BrandProfile; 

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
        $city_id = City::where('short_name',$city_name)->first();
        $city_id = $city_id->id;
        return $city_id;
    }

    public static function profile_id()
    {
        // dd(session()->all());
        $profile_id=Route::input('subdomain');
        // dd(Route::input('subdomain'));
       if($profile_id)
       {
        Session::put('profile_id', $profile_id);
       }
       else{
        $profile_id = Session::get('profile_id');
       }
        $profile_id = BrandProfile::where('short_name',$profile_id)->first();
        if($profile_id)
        {
            $profile_id = $profile_id->id;
        }
        else{
            $profile_id = null;
        }
        return $profile_id;
    }

}
