<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Manual;

class BrandController extends Controller
{
    public function show($brand_id, $brand_slug)
    {

        $brand = Brand::findOrFail($brand_id);
        $manuals = Manual::all()->where('brand_id', $brand_id);

        return view('pages/manual_list', [
            "brand" => $brand,
            "manuals" => $manuals
        ]);
    }

    public function brandsByLetter($letter)
    {
        $brands = Brand::where('name', 'like', $letter . '%')
            ->orderBy('name')
            ->get();

        return view('pages/by_letter', compact('brands', 'letter'));
    }
}
