@extends('app')

@section('title', 'ログイン')

@section('content')

  <div class="container">
    <div class="row">
      <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">
        <h1 class="text-center"><a class="text-dark" href="/">Let's Thinking!!</a></h1>
        <div class="card mt-3">
          <div class="card-body text-center">
            <h2 class="h3 card-title text-center mt-2">ログイン</h2>


            <a href="{{ route('login.{provider}', ['provider' => 'google']) }}" class="btn btn-block btn-danger">
              <i class="fab fa-google mr-1"></i>Googleでログイン
            </a>

            @include('error_card_list')
            
            <div class="card-text">
              <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="md-form">
                  <label for="email">メールアドレス</label>
                  <input class="form-control" type="text" id="email" name="email" required value="{{ old('email') }}">
                </div>

                <div class="md-form">
                  <label for="password">パスワード</label>
                  <input class="form-control" type="password" id="password" name="password" required>
                </div>
 
                
                <input type="hidden" name="remember" id="remember" value="on">

                <div class="text-left">
                  <a href="{{ route('password.request') }}" class="card-text">パスワードを忘れた方</a>
                </div>
              
                <button class="btn btn-block blue-gradient mt-2 mb-2" type="submit">ログイン</button>

              </form>

              <div class="mt-0">
                <a href="{{ route('register') }}" class="card-text">ユーザー登録はこちら</a>
              </div>
            </div>
            <h4 style="margin-top: 30px;">こちらからログインできます</h4><br>
            <p> メールアドレス: testuser@example.com</p>
            <p> パスワード: testuser4649</p>
            <p> ユーザー名: テストユーザー</p>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection