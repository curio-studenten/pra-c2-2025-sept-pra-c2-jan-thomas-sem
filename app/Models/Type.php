<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function manuals()
    {
        return $this->belongsToMany(Manual::class);
    }

    public function getNameUrlEncodedAttribute()
    {
        $name_url_encoded = str_replace('/', '', $this->name);

        return $name_url_encoded;
    }
}
