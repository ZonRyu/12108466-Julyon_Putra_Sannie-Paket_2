<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $guarded = ['id'];

    use HasFactory;

    public function checkout() {
        return $this->hasMany(Sale::class, 'produk_id');
    }
}
