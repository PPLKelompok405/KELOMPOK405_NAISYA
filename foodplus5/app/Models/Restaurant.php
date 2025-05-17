<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'logo_url',
        'description',
        'user_id',
        'is_active'
    ];

    /**
     * Get the user that owns the restaurant.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the foods for the restaurant.
     */
    public function foods()
    {
        return $this->hasMany(Food::class);
    }
}