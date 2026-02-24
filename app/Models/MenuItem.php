<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MenuItem extends Model
{
    use HasFactory;

    // Buka gembok database lu
    protected $fillable = [
        'menu_category_id',
        'name',
        'description',
        'price',
        'image',
        'is_available',
    ];

    // Ngasih tau Laravel kalo menu ini punya satu kategori
    public function menuCategory(): BelongsTo
    {
        return $this->belongsTo(MenuCategory::class);
    }
}