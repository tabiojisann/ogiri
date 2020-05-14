@extends('app')

@section('title', $tag->hashtag)

@section('content')
 <div class="view" style="background-image: url('https://cdn.pixabay.com/photo/2015/08/29/07/45/balloon-912805_1280.jpg'); background-attachment: fixed; background-position: center center;">
    @include('nav')
    <div class="container">
      <div class="card mt-3">
        <div class="card-body">
          <h2 class="h4 card-title m-0">{{ $tag->hashtag }}</h2>
          <div class="card-text text-right">
            <h5>{{ $tag->themes->count() }}件</h5>
          </div>
        </div>
      </div>
      @foreach($tag->themes as $theme)
        <div class="card mt-5 w-50 mx-auto" style="width: 200px;">
          @include('themes.card')

          @isset($theme->image)
            <div class="card-image pt-0">
              <img src ="{{ str_replace('public/', '/storage/', $theme->image) }}"style="height: 100%; width: 100%;">
            </div>
          @endisset
        </div>
        @endforeach
    </div>
  </div>
@endsection