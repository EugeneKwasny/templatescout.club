<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;

class ThemesController extends Controller
{
    public function index(){
        $themes = Theme::orderBy('last_updated', 'desc')->paginate(9);

        return view('themes.index', ['themes' => $themes]);
    }

    public function show(Request $request, $slug){
  
        $theme = Theme::where('slug', $slug)->firstOrFail();
        return view('themes.show', ['theme' => $theme]);
    }
}
