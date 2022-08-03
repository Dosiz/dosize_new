<?php


namespace App\Helpers;


use AshAllenDesign\ShortURL\Classes\Builder;

class Helpers
{
    public static function createShortUrl($url){
        $urlObject = new Builder();
        $shortURLObject = $urlObject->destinationUrl($url)->make();
        $shortURL = $shortURLObject->default_short_url;
        return $shortURL;
    }

}
