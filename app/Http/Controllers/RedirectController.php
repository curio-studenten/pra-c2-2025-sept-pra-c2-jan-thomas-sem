<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Type;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

class RedirectController extends Controller
{
    public function brand( $language, $brand_slug )
    {
        $brand = Brand::where('name',$brand_slug)->firstOrFail();

        $url = '/'.$brand->id.'/'.$brand->name.'/';
        return redirect()->route($url);
    }

    public function datafeed( $brand_slug )
    {
        $brand = Brand::where('name',$brand_slug)->firstOrFail();

        $url = URL::to('sitemap-brand-'.$brand->id).'.xml';
        return redirect()->route($url);
    }

     public function redirectTo($code)
    {
        $row = DB::table('urls')->where('short_code', $code)->first();

        if ($row && isset($row->original_url)) {
            return redirect()->away($row->original_url);
        } else {
            abort(404, 'URL not found');
        }
    }
}
