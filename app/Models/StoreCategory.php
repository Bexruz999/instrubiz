<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class StoreCategory extends Model
{
    use HasFactory;

    public function products(): HasMany
    {
        return $this->hasMany(StoreProduct::class, 'category_id');
    }
}
