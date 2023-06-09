<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login page</title>
  <link href="{{ asset('/dist/css/login.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('/dist/css/nav.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
  <header class="header_register">
    <nav class="nav" id="nav">
    @empty($user->id)
      <ul>
          <li><a href="/" class="menu_link_item">Home</a></li>
          <li><a href="/user" class="menu_link_item">Registration</a></li>
          <li><a href="/auth" class="menu_link_item">Login</a></li>
      </ul>
    @else
      <ul>
          <li><a href="/" class="menu_link_item">Home</a></li>
          <li><a href="/logout" class="menu_link_item">Logout</a></li>
          <li><a href="/mypage" class="menu_link_item">Mypage</a></li>
      </ul>
    @endempty
    </nav>
    <div class="menu_block">
      <div class="menu_link" id="menu_link">
        <span class="menu_line--top"></span>
        <span class="menu_line--middle"></span>
        <span class="menu_line--bottom"></span>
      </div>
      <script src="{{ asset('/dist/js/menu.js') }}"></script>
      <h1 class="icon">Rese</h1>
    </div>
  </header>

  <main class="login_contents">
    <p class="login_title">Login</p>
    <form action="/login" method="get">
      @csrf
      @empty($text)
      @else
      <p class="error">{{$text}}</p>
      @endempty
      <div class="form_text_block">
        <div class="text_email">
          <img src="/images/email_icon.jpg" class="email_icon_img">
          <input class="form_text" name="email" type="text" placeholder="Email">
        </div>
        <div class="text_password">
          <img src="/images/key_icon.jpg" class="key_icon_img">
          <input class="form_text" name="password" type="text" placeholder="Password">
        </div>
      </div>
      <div class="login_botton_block">
        <a href="/user">ユーザー登録していない方はこちら</a>
        <input class="login_botton" type="submit" value="ログイン">
      </div>
    <form>      
  </main>
</body>

</html>