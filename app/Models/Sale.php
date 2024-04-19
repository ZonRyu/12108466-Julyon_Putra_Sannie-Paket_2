<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $guarded = ['id'];

    use HasFactory;

    public function produk() {
        return $this->belongsTo(Produk::class);
    }
}
