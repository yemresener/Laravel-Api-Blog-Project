<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    public function getPosts(){
        return $this->hasMany(Post::class);
    }
}
