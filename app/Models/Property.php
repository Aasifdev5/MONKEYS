<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'thumbnail',
        'price',
        'duration',
        'rating',
        'favorite',
        'max_people',
        'bedrooms',
        'amenities',
        'property_images',
    ];

    protected $casts = [
        'bedrooms' => 'array',
        'price' => 'array',
        'amenities' => 'array',
        'property_images' => 'array',
        'favorite' => 'boolean',
    ];
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
