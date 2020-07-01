@extends('layouts.app')

@section('title', '100+ Collection of Free WordPress Themes Handpicked by TemplateScout')
@section('description', 'Download now Collection of Free WordPress Themes Handpicked by TemplateScout!')

@section('content')
    <section class="main mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Free WordPress Themes </h1>
                    <div class="card-columns mt-4">
                        @foreach ($themes as $theme)
                            @include('themes.grid-item', ['theme' => $theme])
                        @endforeach
                    </div>
                    {{$themes->links()}}
                </div>
            </div> 
        </div>
    </section> 
@endsection