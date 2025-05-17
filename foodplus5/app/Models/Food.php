<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'restaurant_id',
        'quantity_available',
        'image_url'
    ];

    /**
     * Get the restaurant that owns the food.
     */
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    /**
     * Get the requests for this food.
     */
    public function requests()
    {
        return $this->hasMany(FoodRequest::class);
    }
}