<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Restaurant extends Model
{
    protected $fillable = [
        'name',
        'banner'
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    } 
}
