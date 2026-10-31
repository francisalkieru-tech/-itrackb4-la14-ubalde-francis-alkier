<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'stock', 'category_id', 'is_available', 'description'];
    
    protected function casts(): array {
        return [
            'price' => 'integer',
            'stock' => 'integer',
            'is_available' => 'boolean',
        ];
    }

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }
}
