@extends('layouts.app')

@section('title', $meta_tags['title'])
@section('description',  $meta_tags['description'])
@section('styles')
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
@endsection
@section('content')
    <section class="main mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 order-first order-md-last">
                    <h1>{{$heading_h1}}</h1>
                    @if($page_intro)
                        <p class="lead">{{$page_intro}}</p>
                    @endif
                    <div class="card-columns columns-3 mt-4">
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