<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',

    ];

    public function product()
    {
        return $this->belongsTo(Product::class);

    }
}