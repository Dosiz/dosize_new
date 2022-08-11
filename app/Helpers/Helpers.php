<?php


namespace App\Helpers;


use AshAllenDesign\ShortURL\Classes\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Helpers
{
    public static function createShortUrl($url){
        $urlObject = new Builder();
        $shortURLObject = $urlObject->destinationUrl($url)->make();
        if (Auth::check()){
            DB::table('short_urls')
                ->where('id', $shortURLObject->id)
                ->update(['user_id' => Auth::id()]);
        }
        $shortURL = $shortURLObject->default_short_url;
        return $shortURL;
    }

}
