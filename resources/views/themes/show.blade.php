@extends('layouts.themes-show')

@section('title', $theme->name . ' - free Wordpress Theme')
@section('description', 'Download now ' . $theme->name. ' - free Wordpress Theme HandPicked by TemplateScout')

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
                <img src="{{$theme->screenshot_url}}" class="card-img-top shadow-sm" alt="{{$theme->name}}">
                    <div class="card-body py-4 px-0">
                        @if($theme->download_link)
                        <a type="button" href="{{$theme->download_link}}" class="btn btn-block btn-success d-md-none">Free download</a>
                        @endif

                        @if($theme->preview_url)
                            <a type="button" target="blank" href="{{$theme->preview_url}}" class="btn btn-block btn-info mt-3 d-md-none">View demo</a>
                        @endif

                        @if($theme->description)
                            <h5 class="mt-4 mt-md-0">Description</h5>
                            <hr class="mt-0">
                            <p class="card-text">{{$theme->description}}</p>
                        @endif

                        @if($theme->tags())
                            <p class="card-text text-muted">Tags: {{$theme->tags()}}</p>
                        @endif
                    </div>
                  </div>
                
            </div>
            <aside class="sidebar col-md-4 pl-md-4">
                <a type="button" href="{{$theme->download_link}}" class="btn btn-block btn-success d-none d-md-block">Free download</a>
                <a type="button" target="blank" href="{{$theme->preview_url}}" class="btn btn-block btn-info mt-3 d-none d-md-block">View demo</a>


                <div class="mt-md-3">
                    <a target="blank" href="https://wordpress.org/support/theme/{{$theme->slug}}">Support forum</a>
                </div>
                <p class="card-text text-muted mt-3">This item is licensed  100% GPL </p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item px-0  bg-transparent">Author: <a target="blank" href="https://wordpress.org/themes/author/{{$theme->vendor->name}}">{{$theme->vendor->name}}</a></li>
                    
                    @if($theme->version)
                        <li class="list-group-item px-0 bg-transparent">Version: {{$theme->version}}</li>
                    @endif

                    @if($theme->last_updated)
                        <li class="list-group-item px-0 bg-transparent">Last updated: {{$theme->last_updated}}</li>
                    @endif

                    @if($theme->downloaded)
                        <li class="list-group-item px-0 bg-transparent">Downloads: {{$theme->downloaded}}</li>
                    @endif
                    
                  </ul>
                  
                  <div class="mt-3">
                    <a href="https://www.bluehost.com/track/awothemes/" target="blank" rel="nofollow">Get WordPress hosting</a>
                </div>
            </aside>
        </div> 
    </div>
</section> 
@endsection