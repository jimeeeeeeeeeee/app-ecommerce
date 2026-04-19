<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['nombre', 'tipo'];

    public function user()
    {
        return $this->belongsToMany(Role::class);
    }
}
