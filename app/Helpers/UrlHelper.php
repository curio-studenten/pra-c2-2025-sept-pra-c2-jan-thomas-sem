<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UrlHelper
{
    public static function generateShortCode($url)
    {
        // Check if URL already exists
        $existing = DB::table('urls')->where('original_url', $url)->first();
        if ($existing) {
            return $existing->short_code;
        }

        // Generate unique 6-character short code
        $shortCode = substr(md5(uniqid(rand(), true)), 0, 6);

        // Insert into database
        DB::table('urls')->insert([
            'original_url' => $url,
            'short_code' => $shortCode,
        ]);

        return $shortCode;
    }
}
