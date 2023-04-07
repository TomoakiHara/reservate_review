<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>shop list page</title>
  <link href="{{ asset('/dist/css/shop_list.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('/dist/css/nav.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
  <header class="header_shop_list"> 
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
    <form class="search" action="/search" method="get">
      <select name="area_id" class="area_search">
        <option value="" hidden>All area</option>
        @foreach($areas as $area)
          @empty($area_id)
            <option value="{{$area->id}}" >{{$area->area}}</option>
          @else
            @if($area->id == $area_id)
              <option value="{{$area->id}}" selected>{{$area->area}}</option>
            @else
              <option value="{{$area->id}}" >{{$area->area}}</option>
            @endif
          @endempty
        @endforeach
      </select>
      <select name="genre_id" class="genre_search">
        <option value="" hidden>All genre</option>
        @foreach($genres as $genre)
          <option value="{{$genre->id}}" >{{$genre->genre}}</option>
          @empty($area_id)
            <option value="{{$genre->id}}" >{{$genre->genre}}</option>
          @else
            @if($genre->id == $genre_id)
            <option value="{{$genre->id}}" selected>{{$genre->genre}}</option>
            @else
            <option value="{{$genre->id}}" >{{$genre->genre}}</option>
            @endif
          @endempty
        @endforeach
      </select>      
      <input class="search_botton" type="image" src="/images/glass_icon.jpg" alt="">
      @empty($shop)
        <input type="text" name="shop" class="search_form" placeholder="search...">
      @else
        <input type="text" name="shop" class="search_form" placeholder="search..." value={{$shop}}>
      @endempty
    </form>
  </header>

  <main class="shop_list">
    @foreach($shops as $shop)
    <div class="card">      
      <img src="{{$shop->img}}" class="shop_list_photo">
      <div class="shop_list_contents">
        <h1 class="shop_list_name">{{$shop->shop}}</h3>
        <p class="shop_tag">#{{$shop->area->area}}#{{$shop->genre->genre}}</p>
        <div class="shop_link">
          <form action="/detail/?id={{$shop->id}}" method="post">
            @csrf
            <input class="shop_detail_botton" type="submit" value="詳しくみる">
          </form>
          @empty($user->id)
            <form action="/favorite/?shop_id={{$shop->id}}" method="post">
              @csrf
              <input class="favorite_icon" type="submit" value="♡">
            </form>
          @else
            @forelse($shop->favorite as $favorite)
              @if ($user->id == $favorite->user_id && $shop->id == $favorite->shop_id)
                <form action="/delete/?shop_id={{$shop->id}}&user_id={{$user->id}}" method="post">
                  @csrf
                  <input class="favorite_icon" type="submit" value="❤">            
                </form>
              @else
                <form action="/favorite/?shop_id={{$shop->id}}&user_id={{$user->id}}" method="post">
                @csrf
                <input class="favorite_icon" type="submit" value="♡">
                </form>
              @endif
              @empty
                <form action="/favorite/?shop_id={{$shop->id}}&user_id={{$user->id}}" method="post">
                  @csrf
                  <input class="favorite_icon" type="submit" value="♡">
                </form>
              @endempty
            @endforelse
        </div>
      </div>      
    </div>
    @endforeach
  </main>
</html>