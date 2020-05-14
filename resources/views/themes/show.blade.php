@extends('app')

@section('title', '記事詳細')

@section('content')
<div class="view" style="background-image: url('https://cdn.pixabay.com/photo/2017/01/26/08/07/light-bulb-2010022_1280.jpg'); background-attachment: fixed; background-position: center center; height: 100%;">
  @include('nav')
  <div class="card mt-5 w-50 mx-auto" style="width: 200px;">
    @include('themes.card')
  
    <!-- 画像データが入力されてたら表示する。なかったらしない -->
    @isset($theme->image)
      <div class="card-image pt-0">
        <img  src ="{{ str_replace('public/', '/storage/', $theme->image) }}" style="height: 100%; width: 100%;">
      </div>
    @endisset
  
    <!-- 投稿者本人と未ログインユーザーがコメントできないように -->
    @if( Auth::id() !== $theme->user_id )
      <div class="card-footer text-center">
        <form method="POST" action="{{ route('answers.store', $theme) }}">
          @csrf

            <div class="form-group">
              <textarea name="body" required class="form-control" rows="2" placeholder="面白い回答待ってます"></textarea>
              <input type="hidden" name="user_id" value="{{ Auth::id() }}">
              <input type="hidden" name="theme_id" value="{{ $theme->id }}">
              <input type="hidden" name="theme" value="{{ $theme }}">
            </div>    
            <button type="submit" class="btn peach-gradient">回答</button>
          
        </form>
      </div>
    @endif
  </div>
  
 
  
    @foreach($theme->answers as $answer)
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