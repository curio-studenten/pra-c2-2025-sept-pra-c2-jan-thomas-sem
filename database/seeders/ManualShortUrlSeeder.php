<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Manual;
use App\Helpers\UrlHelper;

class ManualShortUrlSeeder extends Seeder
{
    public function run()
    {
        Manual::whereNull('short_url')->chunk(100, function ($manuals) {
            foreach ($manuals as $manual) {
                $manual->short_url = UrlHelper::generateShortCode($manual->url);
                $manual->save();
            }
        });
    }
}
