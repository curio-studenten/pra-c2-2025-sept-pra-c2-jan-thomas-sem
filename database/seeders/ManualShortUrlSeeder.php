<?php
// filepath: 

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Manual;
use App\Helpers\UrlHelper;

class ManualShortUrlSeeder extends Seeder
{
    public function run()
    {
        // query stays whereNull('short_code') and we set short_code below
        Manual::whereNull('short_code')->chunk(100, function ($manuals) {
            foreach ($manuals as $manual) {
                $manual->short_code = UrlHelper::generateShortCode($manual->url);
                $manual->save();
            }
        });
    }
}