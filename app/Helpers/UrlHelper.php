<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UrlHelper
{
    public static function generateShortCode($url)
    {
        // If this original URL already exists in urls table, return its short_code
        $existing = DB::table('urls')->where('original_url', $url)->first();
        if ($existing) {
            return $existing->short_code;
        }

        // Generate unique 4-character short code
        do {
            $shortCode = Str::upper(Str::random(4));
            $collision = DB::table('urls')->where('short_code', $shortCode)->exists();
        } while ($collision);

        // Insert mapping
        DB::table('urls')->insert([
            'original_url' => $url,
            'short_code' => $shortCode,
            'created_at' => now(),
        ]);

        return $shortCode;
    }
}