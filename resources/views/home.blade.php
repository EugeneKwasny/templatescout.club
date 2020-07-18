@extends('layouts.app')

@section('title', 'Free WordPress Themes Handpicked by TemplateScout')
@section('description', 'Download now Free WordPress Themes Handpicked by TemplateScout!')
@section('styles')
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
@endsection
@section('content')
    @include('partials.hero')
@endsection