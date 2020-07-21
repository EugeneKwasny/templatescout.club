<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;
use Carbon\Carbon;

class ThemesController extends Controller
{
    public function index(){
        $themes = Theme::orderBy('last_updated', 'desc')
                        ->orderBy('downloaded', 'desc')
                        ->orderBy('rating', 'desc')
                        ->orderBy('num_ratings', 'desc')
                        ->paginate(9);

        return view('themes.index', ['themes' => $themes]);
    }

    public function show(Request $request, $slug){
  
        $theme = Theme::where('slug', $slug)->firstOrFail();
        return view('themes.show', ['theme' => $theme]);
    }

    public function featured()
    {
        $themes = Theme::where('featured', 1)->paginate(9);
        return view('themes.featured', ['themes' => $themes]);
    }

    public function recent(){
        //$date = Carbon::now();
        $date = Carbon::create(2020, 07, 19);
        $curmonth = $date->format('F, Y');
        $title = 'Recently Added Free WordPress Themes | '. $date->format('F, Y');


        $themes = Theme::where('created_at', '>=', $date->format('Y-m-d'))
                        ->orderBy('created_at', 'desc')
                        ->orderBy('downloaded', 'desc')
                        ->paginate(9);
        return view('themes.recent', [
            'themes' => $themes, 
            'title' => $title,
            'curmonth' => $curmonth
            ]);
    }

    public function popular(){
        $themes = Theme::orderBy('downloaded', 'desc')
                        ->orderBy('rating', 'desc')
                        ->orderBy('num_ratings', 'desc')
                        ->orderBy('last_updated', 'desc')
                        ->paginate(9);

        return view('themes.popular', ['themes' => $themes]);
    }
}
