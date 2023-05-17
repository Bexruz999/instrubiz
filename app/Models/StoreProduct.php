<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StoreProduct extends Model
{
    use HasFactory;

    public function category(): BelongsTo
    {
        return $this->belongsTo(StoreCategory::class, 'category_id');
    }

    public function producer(): BelongsTo
    {
        return $this->belongsTo(StoreProducer::class, 'producer_id');
    }
}
