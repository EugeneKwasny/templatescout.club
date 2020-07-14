@extends('layouts.app')

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
                <img src="{{$theme->screenshot_url}}" class="card-img-top shadow-sm " alt="{{$theme->name}}">
                    <div class="card-body py-4 px-0">
                        <h5>Description</h5>
                        <hr class="mt-0">
                      <p class="card-text">{{$theme->description}}</p>
                      <p class="card-text text-muted">Tags: {{$theme->tags()}}</p>
                    </div>
                  </div>
                
            </div>
            <aside class="sidebar col-md-4 pl-4">
                <a type="button" href="{{$theme->download_link}}" class="btn btn-block btn-success">Free download</a>
                <a type="button" target="blank" href="{{$theme->preview_url}}" class="btn btn-block btn-info mt-3">View demo</a>


                <div class="mt-3">
                    <a target="blank" href="https://wordpress.org/support/theme/{{$theme->slug}}">Support forum</a>
                </div>
                <p class="card-text text-muted mt-3">This item is licensed  100% GPL </p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item px-0  bg-transparent">Author: <a target="blank" href="https://wordpress.org/themes/author/{{$theme->vendor->name}}">{{$theme->vendor->name}}</a></li>
                    <li class="list-group-item px-0 bg-transparent">Version: {{$theme->version}}</li>
                    <li class="list-group-item px-0 bg-transparent">Last updated: {{$theme->last_updated}}</li>
                    <li class="list-group-item px-0 bg-transparent">Downloads: {{$theme->downloaded}}</li>
                  </ul>
                  
                  <div class="mt-3">
                    <a href="https://www.bluehost.com/track/awothemes/" target="blank" rel="nofollow">Get WordPress hosting</a>
                </div>
            </aside>
        </div> 
    </div>
</section> 
@endsection