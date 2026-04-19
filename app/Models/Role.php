<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['nombre']; //protección masiva para inyección de datos

    public function user()
    {
        return $this->belongsToMany(User::class);
        
    } 

    public function permission()
    {
        return $this->hasMany(Permission::class);
    }
}
