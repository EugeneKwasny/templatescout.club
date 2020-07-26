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
                <div class="col-md-3"></div>
                <div class="col-md-9">
                    <h1>{{$heading_h1}}</h1>
                    @if($page_intro)
                        <p class="lead">{{$page_intro}}</p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mt-4">
                    <h5>Filter by tags:</h5>
                    @if($tags)
                    <ul class="list-unstyled">
                        @foreach($tags as $tag)
                        <li>
                            <a 
                            @if($currentTag)
                                class="{!!($tag->slug == $currentTag->slug) ? 'text-dark font-weight-bold' : 'text-muted'!!}" 
                            @else
                            class="text-muted" 
                            @endif
                                href="{{$tag->tag_path()}}">{{ucfirst($tag->title)}}</a>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div class="col-md-9 order-first order-md-last">
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