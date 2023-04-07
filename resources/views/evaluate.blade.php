<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>mypage</title>
  <link href="{{ asset('/dist/css/evaluate.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('/dist/css/nav.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
  <header class="header_mypage">
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

  <main class="evaluate_contents">
    <h1 class="evaluate_title">店舗評価一覧</h1>
    <table class="evaluate_table">
      <tr class="evaluate_table_row">
        <th class="evaluate_table_title">店舗名</th>
        <th class="evaluate_table_title">ユーザー名</th>
        <th class="evaluate_table_title">評価<br>※5(大変満足)ー1(不満)</th>
      </tr>
      @foreach($evaluates as $evaluate)
      <tr class="evaluate_table_row">
        <td class="evaluate_table_item">{{$evaluate->shop->shop}}</td>
        <td class="evaluate_table_item">{{$evaluate->user->name}}</td>
        <td class="evaluate_table_item">{{$evaluate->evaluate}}</td>
      </tr>
      @endforeach
    </table>
    @foreach($shops as $shop)
    <form action="/detail/?id={{$shop->id}}" method="post">
      @csrf
      <input class="evaluate_return_botton" type="submit" value="戻る">
    </form>
    @endforeach
  </main>

</body>   
</html>