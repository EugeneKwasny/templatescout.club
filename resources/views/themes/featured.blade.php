@extends('layouts.app')

@section('title', 'Featured Collection of Free WordPress Themes Handpicked by TemplateScout')
@section('description', 'Download Free Featured WordPress Themes Handpicked by TemplateScout team!')

@section('content')
    <section class="main mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Featured WordPress Themes </h1>
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