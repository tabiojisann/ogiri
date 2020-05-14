
<nav class="navbar navbar-expand navbar-dark aqua-gradient sticky-top scrolling-navbar">

  <a class="navbar-brand" href="/"><i class="fas fa-2x fa-arrow-left mr-1"></i></a>

  <ul class="navbar-nav ml-auto">

    @guest 
    <li class="nav-item">
      <a class="nav-link" style="font-size: 18px;" href="{{ route('register') }}">ユーザー登録</a>
    </li>
    @endguest 

    @guest 
    <li class="nav-item">
      <a class="nav-link" style="font-size: 18px;" href="{{ route('login') }}">ログイン</a>
    </li>
    @endguest 

    @auth 
    <li class="nav-item mx-auto" style="width: 400px;">
      <a class="nav-link" href="{{ route('users.show', ['name' => Auth::user()->name]) }}" style="font-size: 30px;" href="/">{{ Auth::user()->name }}</a>
    </li>
    @endauth 
      
    @auth 
    <li class="nav-item">
      <a class="nav-link" href="{{ route('themes.create') }}"><i class="fab fa-2x fa-medapps mr-1" style="color: yellow;"></i>お題を出す</a>
    </li>
    @endauth 

    
    
    
    
    @auth
    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle " id="navbarDropdownMenuLink" data-toggle="dropdown"
         aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-2x fa-user-circle"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
        <button class="dropdown-item" type="button"
                onclick="location.href='{{ route('users.show', ['name' => Auth::user()->name]) }}'">
          マイページ
        </button>
        <div class="dropdown-divider"></div>
        <button form="logout-button" class="dropdown-item" type="submit">
          ログアウト
        </button>
      </div>
    </li>
    <form id="logout-button" method="POST" action="{{ route('logout') }}"> 
      @csrf 
    </form>
    <!-- Dropdown -->
    @endauth 

  </ul>

</nav>