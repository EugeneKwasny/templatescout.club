<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{

    protected $tags = [
        'business',
        'creative',
        'design',
        'showcase',
        'studio',
        'multipurpose',
        'shop',
        'personal portfolio',
        'freelance',
        'gallery',
        'blog',
        'photography',
        'creative agency',
        'digital agency',
        'art',
        'design agency',
        'fashion',
        'ecommerce',
        'events',
        'illustration',
        'marketing',
        'app showcase',
        'video',
        'lifestyle',
        'coming soon',
        'startup',
        'animation',
        'professional',
        'music',
        'beauty',
        'hair salon',
        'recipe',
        'hotel',
        'clothing',
        'fullscreen',
        'hosting',
        'catering',
        'fitness',
        'sports',
        'politics',
        'food',
        'magazine',
        'news',
        'preschool',
        'charity',
        'medical',
        'law',
        'travel',
        'wedding',
        'education',
        'event',
        'restaurant',
        'minimalist',
        'real estate',
        'church',
        'parallax',
        'nonprofit'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->tags as $tag){

            $slug = str_replace(' ', '_', $tag);

            DB::table('tags')->insert([
                'title' => $tag,
                'slug' => $slug,
            ]);


        }

    }
}
