<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Listing extends Model
{
    protected $fillable = [
        "title",
        "description",
        "price",
        "category",
        "condition",
        "seller_phone",
        "image",
    ];
    protected $casts = [
        "category" => "string",
        "price" => "decimal:2",
        "condition" => "string",
        "seller_phone" => "string",
        "image" => "string",
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
