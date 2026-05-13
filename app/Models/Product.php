<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'precio', 'status'];

    public function user()
    {
        return $this->belongsToMany(Category::class);
    }
}
