@extends('app')

@section('title', $user->name . 'のいいねした記事')

@section('content')
  <div class="view" style="background-image: url('https://cdn.pixabay.com/photo/2017/07/10/23/43/question-mark-2492009_1280.jpg'); background-attachment: fixed; background-position: center center; height: 100%;">
    @include('nav')
    <div class="container">
      @include('users.user')
      @include('users.tabs', ['hasThemes' => false, 'hasLikes' => true])
      @foreach($answers as $answer)
      <div class="card mt-5 w-50 mx-auto" style="width: 200px;">
        <div class="card-body d-flex flex-row">
          <i class="fas fa-user-circle fa-2x mr-1 " ></i>
          <div>
            <div class="font-weight-bold">{{ $answer->user->name }}</div>
            <div class="font-weight-lighter">{{ $answer->created_at->format('Y/m/d H:i') }}</div>
            <div class="font-weight-bold">{{ optional($answer)->body }}</div>
          </div>
        </div>

        <div class="card-body pt-0 pb-2 pl-4">
          <div class="card-text">
              <answer-like
              :initial-is-liked-by='@json($answer->isLikedBy(Auth::user()))' 
              :initial-count-likes='@json($answer->count_likes)'  
              :authorized='@json(Auth::check())'
              endpoint="{{ route('answers.like', ['answer' => $answer]) }}"  
              >
              </answer-like>
          </div> 
        </div>
      </div>
      @endforeach
    </div>
  </div>
@endsection