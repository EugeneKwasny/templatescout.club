@extends('layouts.app')

@section('title', $theme->name . ' - free Wordpress Theme')
@section('description', 'Download now ' . $theme->name. ' - free Wordpress Theme HandPicked by TemplateScout')
@section('styles')
    <link rel="stylesheet" href="{{ mix('/css/themes.show.css') }}">
@endsection
@section('content')
<section class="main mt-5 mb-5">
    <div class="container">
        <div class="row"> 
            <div class="col">
                <h1 class="mb-4">{{$theme->name}}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card border-0 bg-transparent">
                <img width="730" src="{{$theme->screenshot_url}}" class="card-img-top shadow-sm" alt="{{$theme->name}}">
                    <div class="card-body py-4 px-0">
                        @if($theme->download_link)
                            <a type="button"  rel="nofollow" href="{{$theme->download_link}}" class="btn btn-block btn-success d-md-none">Free download</a>
                        @endif

                        @if($theme->preview_url)
                            <a type="button"  rel="nofollow" target="blank" href="{{$theme->preview_url}}" class="btn btn-block btn-info mt-3 d-md-none">View demo</a>
                        @endif

                        @if($theme->description)
                            <h5 class="mt-4 mt-md-0">Description</h5>
                            <hr class="mt-0">
                            <p class="card-text">{{$theme->description}}</p>
                        @endif

                        @if($theme->specifications())

                        <h6 class="mt-4 mt-md-0 font-weight-bold">Specifications:</h6>
                        {{-- <hr class="mt-0"> --}}
                            <ul class="list-unstyled" style="column-count:3">
                            @foreach ($theme->specifications() as $spec)
                                <li>- {{$spec}}</li>
                            @endforeach
                            </ul>
                        @endif
                    </div>
                  </div>
                
            </div>
            <aside class="sidebar col-md-4 pl-md-4">
                <a type="button" href="{{$theme->download_link}}" class="btn btn-block btn-success d-none d-md-block">Free download</a>
                <a type="button" target="blank" href="{{$theme->preview_url}}" class="btn btn-block btn-info mt-3 d-none d-md-block">View demo</a>


                <p class="card-text text-muted mt-3">This item is licensed  100% GPL </p>
                <ul class="list-group list-group-flush">
                    @if($theme->rating)
                <li class="list-group-item px-0 bg-transparent">Rating: {{$theme->rating/20}}/5 <span class="text-muted">based on wordpress.org <a class="text-muted"  rel="nofollow" target="blank" href="https://wordpress.org/support/theme/{{$theme->slug}}/reviews/">reviews</a></span></li>
                    @endif
                    @if($theme->downloaded)
                        <li class="list-group-item px-0 bg-transparent">Downloads: {{number_format($theme->downloaded, 0, ',', ' ')}}</li>
                    @endif
                    <li class="list-group-item px-0  bg-transparent">Support: regular support via <a target="blank" rel="nofollow" href="https://wordpress.org/support/theme/{{$theme->slug}}">forum</a></li>

                    @if($theme->version)
                        <li class="list-group-item px-0 bg-transparent">Version: {{$theme->version}}</li>
                    @endif

                    @if($theme->last_updated)
                        <li class="list-group-item px-0 bg-transparent">Last updated: {{$theme->last_updated}}</li>
                    @endif

                    <li class="list-group-item px-0  bg-transparent">Author: <a class="text-dark" target="blank"  rel="nofollow" href="https://wordpress.org/themes/author/{{$theme->vendor->name}}">{{$theme->vendor->name}}</a></li>

                  </ul>
                  
                  {{-- <div class="mt-3">
                    <a target="blank" href="/wordpress-hosting">Get WordPress hosting</a>
                </div> --}}
            </aside>
        </div> 
    </div>
</section> 
@endsection