<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'status',
    ];
    public function subCategory():HasMany
    {
        return $this->hasMany(SubCategory::class);
    }
    
    public function childCategory():HasManyThrough
    {
        return $this->hasManyThrough(ChildCategory::class, SubCategory::class);
    }
}
