@extends('app')

@section('title', $user->name)

@section('content')
<div class="view" style="background-image: url('https://cdn.pixabay.com/photo/2016/11/30/12/16/question-mark-1872665_1280.jpg'); background-attachment: fixed; background-position: center center; height: 100%;">
  @include('nav')
  <div class="container">
    @include('users.user')
    @include('users.tabs', ['hasThemes' => true, 'hasLikes' => false])
      @foreach($themes as $theme)
        <div class="card mt-5 w-50 mx-auto" style="width: 200px;">
          @include('themes.card')
            @isset($theme->image)
              <div class="card-image pt-0">
                <img  src ="{{ str_replace('public/', '/storage/', $theme->image) }}" style="height: 100%; width: 100%;">
              </div>
            @endisset
        </div>
      @endforeach
    </div>
</div>
@endsection