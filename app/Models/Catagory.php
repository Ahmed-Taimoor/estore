<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Catagory extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function subCategories()
    {
        return $this->hasMany(SubCatagory::class);
    }
}