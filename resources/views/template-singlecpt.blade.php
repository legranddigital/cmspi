{{--
  Template Name: Single CPT Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.content-single-cpt')
  @endwhile
@endsection
