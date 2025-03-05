<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>coachtech-fleamarket</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
  @yield('css')
</head>

<body>
  <div class="app">
    <header class="header">
      <a href="/"><img class="header__logo" src="{{ asset('img/logo.svg') }}" alt="ロゴ"></a>

      @if (!in_array(Route::currentRouteName(), ['register', 'login', 'verification.notice']))
      <form class="item-search" action="{{ route('item.index') }}" method="get">
        @csrf
        <div class="item-search__keyword">
          <input class="item-search__keyword-input" type="search" name="keyword" placeholder="なにをお探しですか？" value="{{ request()->query('keyword', '') }}">
        </div>
      </form>
      <nav class="header-nav">
        <ul class="header-nav__menu">
          @guest
          <li class="header-nav__item"><a class="header-nav__login" href="/login">ログイン</a></li>
          @endguest

          @auth
          <form class="header-nav__button" action="/logout" method="post">
            @csrf
            <button class="header-nav__logout">ログアウト</button>
          </form>
          @endauth

          <li class="header-nav__item"><a class="header-nav__mypage" href="/mypage">マイページ</a></li>
          <li class="header-nav__item"><a class="header-nav__link" href="/sell">出品</a></li>
        </ul>
      </nav>
      @endif
    </header>

    <main class="content">
      @yield('content')
    </main>
  </div>
</body>
</html>