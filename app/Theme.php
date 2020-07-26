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
        return $this->belongsToMany('App\Tag');
    }
    


    public function specifications(){
        if(!$this->specifications){
            return;
        }

        $rejectList = [
            'blog', 'e-commerce', 'news', 'education',  
            'entertainment',  'food & drink',  'holiday',  'news',
            'photography',  'portfolio'
        ];

        $specificationsArray = json_decode($this->specifications);



        foreach($specificationsArray as $slug=>$label){
            if(in_array($slug, $rejectList)){
                continue;
            }
            $specifications[] = $label;
        }

        return $specifications;

        //return implode(', ', $specifications);
    }
}
