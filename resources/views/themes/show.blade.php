@extends('layouts.app')

@section('title', $theme->name . ' - free Wordpress Theme')
@section('description', 'Download now ' . $theme->name. ' - free Wordpress Theme HandPicked by TemplateScout')

@section('content')
<section class="main mt-4 mb-4">
    <div class="container">
        <div class="row"> 
            <div class="col">
                <h1 class="mb-4">{{$theme->name}}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                <img src="{{$theme->screenshot_url}}" class="card-img-top" alt="{{$theme->name}}">
                    <div class="card-body">
                      <p class="card-text">{{$theme->description}}</p>
                      <p class="card-text text-muted">Tags: {{$theme->tags()}}</p>
                    </div>
                  </div>
                
            </div>
            <aside class="sidebar col-md-3 px-4 py-4 bg-white rounded">
                <div class="btn-group">
                    <a type="button" href="{{$theme->download_link}}" class="btn btn-outline-success">Free download</a>
                    <a type="button" target="blank" href="{{$theme->preview_url}}" class="btn btn btn-outline-info">Demo</a>
                </div>
                <div class="mt-3">
                    <a target="blank" href="https://wordpress.org/support/theme/{{$theme->slug}}">Support forum</a>
                </div>
                <p class="card-text text-muted mt-3">This item is licensed  100% GPL </p>
                <ul class="list-unstyled">
                <li>Author: <a target="blank" href="https://wordpress.org/themes/author/{{$theme->vendor->name}}">{{$theme->vendor->name}}</a></li>
                    <li>Version: {{$theme->version}}</li>
                    <li>Last updated: {{$theme->last_updated}}</li>
                    <li>Downloads: {{$theme->downloaded}}</li>
                  </ul>
                  
                  <div class="mt-3">
                    <a href="https://www.bluehost.com/track/awothemes/" target="blank" rel="nofollow">Get WordPress hosting</a>
                </div>
            </aside>
        </div> 
    </div>
</section> 
@endsection