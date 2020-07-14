<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Theme extends Model
{
    protected $guarded = [];

    public function vendor(){
        return $this->BelongsTo('App\Vendor');
    }

    public function theme_path(){
        return route('theme_path', ['slug' => $this->slug]);
    }

    public function tags(){
        if(!$this->tags){
            return;
        }

        $tagsArray = json_decode($this->tags);

        foreach($tagsArray as $slug=>$label){
            $tags[] = $label;
        }

        return implode(', ', $tags);
    }
}
