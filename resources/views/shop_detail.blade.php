<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>shop detail page</title>
  <link href="{{ asset('/dist/css/shop_detail.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('/dist/css/nav.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
  <main class="shop_detail_contents">
    <div class="shop_detail">
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
      @foreach($details as $detail)
        <div class="shop_detail_title_block">
          <form action="/" method="get">
            @csrf
            <input class="shop_detail_return_botton" type="submit" value="<">
          </form>
          <h1 class="shop_detail_name">{{$detail->shop}}</h2>
        </div>
        <img src="{{$detail->img}}" class="shop_detail_photo">
        <p class="shop_detail_tag">#{{$detail->area->area}}#{{$detail->genre->genre}}</p>
        <p class="shop_detail_summary">{{$detail->summary}}</p>
      <!-- 評価ページ移動ボタン追加 -->
        <form action="/evaluate/?shop_id={{$detail->id}}" method="post">
          @csrf
          <input class="move_evaluate_botton" type="submit" value="この店舗の評価を見る">
        </form>
        @endforeach
    </div>
    @empty($user->id)
      <form action="/reserve/?shop_id={{$detail->id}}" method="post" class="shop_reservation_form">
        @csrf
        <div class="shop_reservation">      
          <h3 class="shop_reservation_title">予約</h3>
          <div>
            <input type="date" name="reserve_date" class="shop_reservation_date" id="reserveDate">
          </div>
          <div>
            @component('components.reserve_time')
            @endcomponent
          </div>
          <div>
            @component('components.reserve_number')
            @endcomponent
          </div>
          <table class="shop_reservation_table">
            <tr class="shop_detail_table_row">
              <th class="shop_reservation_table_title">Shop</th>
              <td class="shop_reservation_tabel_item">{{$detail->shop}}</td>
            </tr>
            <tr class="shop_detail_table_row">
              <th class="shop_reservation_table_title">Date</th>
              <td class="shop_reservation_tabel_item" id="msgDate"></td>
            </tr>
            <tr class="shop_detail_table_row">
              <th class="shop_reservation_table_title">Time</th>
              <td class="shop_reservation_tabel_item" id="msgTime"></td>
            </tr>
            <tr class="shop_detail_table_row">
              <th class="shop_reservation_table_title">Number</th>
              <td class="shop_reservation_tabel_item" id="msgNumber"></td>
            </tr>
            <script src="{{ asset('/dist/js/reserve.js') }}"></script>
          </table>
        </div>
        <input class="shop_reservation_botton" type="submit" value="予約する">              
      </form> 
    @else
      <form action="/reserve/?shop_id={{$detail->id}}&user_id={{$user->id}}" method="post" class="shop_reservation_form">
        @csrf
        <div class="shop_reservation">      
          <h1 class="shop_reservation_title">予約</h3>
          <div>
            <input type="date" name="reserve_date" class="shop_reservation_date" id="reserveDate">
          </div>
          <div>
            @component('components.reserve_time')
            @endcomponent
          </div>
          <div>
            @component('components.reserve_number')
            @endcomponent
          </div>
          <table class="shop_reservation_table">
            <tr class="shop_detail_table_row">
              <th class="shop_reservation_table_title">Shop</th>
              <td class="shop_reservation_tabel_item">{{$detail->shop}}</td>
            </tr>
            <tr class="shop_detail_table_row">
              <th class="shop_reservation_table_title">Date</th>
              <td class="shop_reservation_tabel_item" id="msgDate"></td>
            </tr>
            <tr class="shop_detail_table_row">
              <th class="shop_reservation_table_title">Time</th>
              <td class="shop_reservation_tabel_item" id="msgTime"></td>
            </tr>
            <tr class="shop_detail_table_row">
              <th class="shop_reservation_table_title">Number</th>
              <td class="shop_reservation_tabel_item" id="msgNumber"></td>
            </tr>
            <script src="{{ asset('/dist/js/reserve.js') }}"></script>
          </table>
        </div>
        <input class="shop_reservation_botton" type="submit" value="予約する">              
      </form> 
    @endempty
  </main>
</body>

</html>