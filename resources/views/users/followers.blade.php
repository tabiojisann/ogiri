@extends('app')

@section('title', $user->name . 'のフォロワー')

@section('content')
  <div class="view" style="background-image: url('https://cdn.pixabay.com/photo/2016/01/06/21/42/light-bulbs-1125016_1280.jpg'); background-attachment: fixed; background-position: center center; height: 100vh;">
    @include('nav')
    <div class="container">
      @include('users.user')
      @include('users.tabs', ['hasThemes' => false, 'hasLikes' => false])
      @foreach($followers as $person)
        @include('users.person')
      @endforeach
    </div>
  </div>  
@endsection