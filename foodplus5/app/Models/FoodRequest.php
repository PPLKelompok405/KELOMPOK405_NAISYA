<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'food_id',
        'quantity',
        'notes',
        'status'
    ];

    /**
     * Get the user that made the request.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the food item that was requested.
     */
    public function food()
    {
        return $this->belongsTo(Food::class);
    }
}