<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    // Pake guarded kosong biar semua field bisa diisi otomatis (jalan pintas boss!)
    protected $guarded = []; 
}