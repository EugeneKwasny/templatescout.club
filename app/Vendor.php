<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $guarded = [];
    
    public function themes(){
        $this->hasMany('App\Theme');
    }
}
