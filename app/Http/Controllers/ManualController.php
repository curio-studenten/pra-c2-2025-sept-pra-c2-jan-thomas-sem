<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Manual;

class ManualController extends Controller
{
    public function show($brand_id, $brand_slug, $manual_id, $type_id, $type_slug)
    {
        $brand = Brand::findOrFail($brand_id);
        $manual = Manual::findOrFail($manual_id);

        return view('pages/manual_view', [
            "manual" => $manual,
            "brand" => $brand,
        ]);
    }

    public function redirect($manual_id)
    {

      
        $manual = Manual::findOrFail($manual_id);
        $manual->increment('counter');
        $manual->save();

        return redirect()->to($manual->url);
    }
}
