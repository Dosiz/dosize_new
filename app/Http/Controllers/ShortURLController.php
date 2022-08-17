<?php

//namespace AshAllenDesign\ShortURL\Controllers;
namespace App\Http\Controllers;

use App\Helpers\PointsHelper;
use App\Models\Blog;
use App\Models\Point;
use App\Models\Product;
use App\Models\ProductComment;
use AshAllenDesign\ShortURL\Classes\Resolver;
use AshAllenDesign\ShortURL\Models\ShortURL;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShortURLController
{
    /**
     * Redirect the user to the intended destination
     * URL. If the default route has been disabled
     * in the config but the controller has been
     * reached using that route, return HTTP
     * 404.
     *
     * @param  Request  $request
     * @param  Resolver  $resolver
     * @param  string  $shortURLKey
     * @return RedirectResponse
     */
    public function __invoke(Request $request, Resolver $resolver, string $shortURLKey): RedirectResponse
    {
        if ($request->route()->getName() === 'short-url.invoke'
            && config('short-url.disable_default_route')) {
            abort(404);
        }

        $shortURL = ShortURL::where('url_key', $shortURLKey)->firstOrFail();

        if ($shortURL->visits->where('ip_address',$request->ip())->count() < 1){
            $url_segments = explode('/',$shortURL->destination_url);
            $id = array_pop($url_segments);
            $point = Point::create([
                'source' => $shortURL->source,
                'points' => PointsHelper::ShareLink,
                'user_id' => $shortURL->user_id,
                'sourceable_id' => $shortURL->id,
                'sourceable_type' => ShortURL::class
            ]);

            $baseModel = null;

            if ($shortURL->source == PointsHelper::Product) {
                $baseModel = Product::find($id);
            }elseif ($shortURL->source == PointsHelper::Article) {
                $baseModel = Blog::find($id);
            }

            if (!empty($baseModel)){
                $baseModel->points()->save($point);
            }
        }

        $resolver->handleVisit(request(), $shortURL);


        return redirect($shortURL->destination_url, $shortURL->redirect_status_code);
    }
}
