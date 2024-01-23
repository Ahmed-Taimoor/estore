<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'price'
    ];


    public function subCategories()
    {
        return $this->belongsTo(SubCatagory::class)->cascadeDelete();
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function titleImage()
    {
        return $this->hasOne(ProductTitleImage::class);
    }
    public function homeProduct()
    {
        return $this->hasOne(HomeProduct::class);
    }
}