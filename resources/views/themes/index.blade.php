@extends('app')

@section('title', '記事一覧')

@section('content')
  @include('nav')
  <div class="view" style="background-image: url('https://cdn.pixabay.com/photo/2010/12/13/10/03/question-marks-2215_1280.jpg'); background-attachment: fixed; background-position: center center;">
  
    <div class="container">
       @foreach($themes as $theme)
        <div class="card mt-4 w-50  mx-auto" style="width: 200px; ">
          @include('themes.card')
          @isset($theme->image)
            <div class="card-image pt-0">
              <img src ="{{ str_replace('public/', 'storage/', $theme->image) }}"style="height: 100%; width: 100%; ">
            </div>
          @endisset 
        </div>
       @endforeach
    </div>
  </div>
@endsection

