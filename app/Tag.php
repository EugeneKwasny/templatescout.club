<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function tag_path(){
        return route('tag_path', ['slug' => $this->slug]);
    }

    public function themes(){
        return $this->belongsToMany('App\Theme');
    }
}
