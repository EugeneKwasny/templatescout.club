<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;
use Carbon\Carbon;

class ThemesController extends Controller
{

    public function show(Request $request, $slug){
  
        $theme = Theme::with('tags')->where('slug', $slug)->firstOrFail();
        $tags = $theme->tags;

        return view('themes.show', ['theme' => $theme, 'tags'=> $tags]);
    }


    public function index(){
        $themes = Theme::orderBy('last_updated', 'desc')
                        ->orderBy('downloaded', 'desc')
                        ->orderBy('rating', 'desc')
                        ->orderBy('num_ratings', 'desc')
                        ->paginate(10);

        $meta_tags['title'] = '100+ Collection of Free WordPress Themes Handpicked by TemplateScout';
        $meta_tags['description'] =  'Download Free WordPress Themes Handpicked by TemplateScout team!';
        $h1 = 'Free WordPress Themes';


        return view('themes.index', [
            'themes' => $themes,
            'meta_tags' => $meta_tags,
            'heading_h1' => $h1,
            'page_intro' => null,
            'tags' => $this->getTags(),
            'currentTag'=> null
            ]);
    }


    public function featured()
    {
        $themes = Theme::where('featured', 1)->paginate(10);

        $meta_tags['title'] = '100+ Featured Collection of Free WordPress Themes Handpicked by TemplateScout';
        $meta_tags['description'] =  'Download Featured Free WordPress Themes Handpicked by TemplateScout team!';
        $h1 = 'Featured WordPress Themes';


        return view('themes.featured', [
            'themes' => $themes,
            'meta_tags' => $meta_tags,
            'heading_h1' => $h1,
            'page_intro' => null,
            'tags' => $this->getTags(),
            'currentTag'=> null
            ]);
    }

    public function recent(){
        //$date = Carbon::now();
        $date = Carbon::create(2020, 07, 19);
        $curmonth = $date->format('F, Y');


        $themes = Theme::where('created_at', '>=', $date->format('Y-m-d'))
                        ->orderBy('created_at', 'desc')
                        ->orderBy('downloaded', 'desc')
                        ->paginate(10);

        $meta_tags['title'] = 'Recently Added Free WordPress Themes | '. $date->format('F, Y');
        $meta_tags['description'] =  'Download Free WordPress Themes Handpicked by TemplateScout team!';
        $h1 = 'Recent WordPress Themes';
        $intro = 'Every day we select & aggregate WordPress themes created in July 2020 by WP community theme authors. Items are sorted by date of creation and current downloads counter. So, on this page, you can quickly find trendy items of the current month.';

        return view('themes.recent', [
            'themes' => $themes, 
            'curmonth' => $curmonth,
            'meta_tags' => $meta_tags,
            'heading_h1' => $h1,
            'page_intro' => $intro,
            'tags' => $this->getTags(),
            'currentTag'=> null
            ]);
    }

    public function popular(){
        $themes = Theme::orderBy('rating', 'desc')
                        ->orderBy('num_ratings', 'desc')
                        ->orderBy('downloaded', 'desc')
                        ->orderBy('last_updated', 'desc')
                        ->paginate(10);

        $meta_tags['title'] = '100+ Collection of Popular Free WordPress Themes Handpicked by TemplateScout';
        $meta_tags['description'] =  'Download now Collection of Popular Free WordPress Themes Handpicked by TemplateScout!';
        $h1 = 'Popular Free WordPress Themes';

        return view('themes.index', [
            'themes' => $themes,
            'meta_tags' => $meta_tags,
            'heading_h1' => $h1,
            'page_intro' => null,
            'tags' => $this->getTags(),
            'currentTag'=> null
        ]);
    }

    public function byTag($slug)
    {
        $tagObject = \App\Tag::where('slug', $slug)->firstOrFail();
        $themes = $tagObject->themes()
                            ->orderBy('last_updated', 'desc')
                            ->orderBy('downloaded', 'desc')
                            ->orderBy('rating', 'desc')
                            ->orderBy('num_ratings', 'desc')
                            ->paginate(10);

        $meta_tags['title'] = '100+ Collection of  Free ' . ucfirst($tagObject->title) . ' WordPress Themes Handpicked by TemplateScout';
        $meta_tags['description'] =  'Download now Collection of Free '.ucfirst($tagObject->title).'  WordPress Themes Handpicked by TemplateScout!';
        $h1 = ucfirst($tagObject->title).' WordPress Themes';

        return view('themes.index', [
            'themes' => $themes, 
            'currentTag'=>$tagObject, 
            'meta_tags' => $meta_tags,
            'heading_h1' => $h1,
            'page_intro' => null,
            'tags' => $this->getTags()
            ]
        );
    }

    protected function getTags(){
        return \App\Tag::all();    
    }
}
