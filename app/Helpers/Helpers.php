<?php


namespace App\Helpers;


use AshAllenDesign\ShortURL\Classes\Builder;
use AshAllenDesign\ShortURL\Models\ShortURL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

}
