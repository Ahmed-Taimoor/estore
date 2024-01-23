<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCatagory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name'
    ];


    public function categories()
    {
        return $this->belongsTo(Catagory::class, 'catagory_id', 'id')->cascadeDelete();
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }

}