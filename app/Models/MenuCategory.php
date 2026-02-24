<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuCategory extends Model
{
    use HasFactory;

    // Tambahin ini biar datanya bisa disimpen!
    protected $fillable = ['name', 'sort_order'];
}