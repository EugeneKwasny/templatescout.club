<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;

class ThemesController extends Controller
{
    public function index(){
        $themes = Theme::paginate(9);

        return view('themes.index', ['themes' => $themes]);
    }

    public function show(Request $request, $slug){
  
        $theme = Theme::where('slug', $slug)->first();
        return view('themes.show', ['theme' => $theme]);
    }
}
