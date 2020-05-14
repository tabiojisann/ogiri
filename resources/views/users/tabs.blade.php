<ul class="nav nav-tabs nav-justified mt-3">
  <li class="nav-item">
    <a class="nav-link yellow-text {{ $hasThemes ? 'active' : '' }}"
       href="{{ route('users.show', ['name' => $user->name]) }}">
      投稿したお題
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link yellow-text {{ $hasLikes ? 'active' : '' }}"
       href="{{ route('users.likes', ['name' => $user->name]) }}">
      いいねした回答
    </a>
  </li>
</ul>