@extends('layouts.app')

@section('title', $title)
@section('description', 'Download Free WordPress Themes Handpicked by TemplateScout team!')

@section('content')
    <section class="main mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Recent WordPress Themes</h1>
                <p class="lead">Every day we select & aggregate WordPress themes created in July 2020 by WP community theme authors. Items are sorted by date of creation and current downloads counter. So, on this page, you can quickly find trendy items of the current month.</p>
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