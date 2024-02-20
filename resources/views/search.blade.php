@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
  <section class="resultPageSection">
        <div class="section-inner">
      <h3>
        {{ __('Sorry, no results were found.', 'sage') }} 
      </h3>
  @endif

  @include('partials.content-search')
  </div>
</section>
  {!! get_the_posts_navigation() !!}
@endsection
