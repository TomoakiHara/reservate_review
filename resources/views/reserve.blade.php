<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>reserve completion page</title>
  <link href="{{ asset('/dist/css/reserve.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('/dist/css/nav.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
  <header class="header_thanks">
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

  <main class="thanks_contents">
    <p class="thanks_comment">ご予約ありがとうございました</p>
    <form action="/" method="get">
      <input class="thanks_return_botton" type="submit" value="戻る">
    <form>      
  </main>
</body>

</html>