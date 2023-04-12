<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Favorite;
use App\Models\Evaluate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // dd($user);

        if(is_null($user)) {
            $shops = Shop::all();
            // dd($shops);
            $areas = Area::all();
            // dd($areas);
            $genres = Genre::all();
            // dd($genres);
            $param = ['shops' => $shops, 'areas' => $areas, 'genres' => $genres, 'user' => $user];
            // dd($param);
            return view('shop_list', $param);
        }else{
            $shops = Shop::all();
            // dd($shops);
            $areas = Area::all();
            // dd($areas);
            $genres = Genre::all();
            // dd($genres);
            $favorites = Favorite::where('user_id', $user->id) -> get();
            // dd($favorites);
            $param = ['shops' => $shops, 'areas' => $areas, 'genres' => $genres,'favorites' => $favorites, 'user' => $user];
            // dd($param);
            return view('shop_list', $param);
        }
    }

    public function search(Request $request)
    {
        $query = Shop::query();
        // dd($query);
        // dd($request);
        
        $area_id = $request->input('area_id');
        $genre_id = $request->input('genre_id');
        $shop = $request->input('shop');
        // dd($area_id);
        // dd($genre_id);
        // dd($shop);

        if(!empty($area_id)) {
            $query->where('area_id', 'like', "%{$area_id}%");
        }
        if(!empty($genre_id)) {
            $query->where('genre_id', 'like', "%{$genre_id}%");
        }
        if(!empty($shop)) {
            $query->where('shop', 'like', "%{$shop}%");
        }

        $shops = $query->get();
        // dd($shops);

        $areas = Area::all();
        // dd($areas);
        $genres = Genre::all();
        // dd($genres);

        $param = [
        'area_id' => $area_id,
        'genre_id' => $genre_id,
        'shop' => $shop,
        'shops' => $shops,
        'areas' => $areas, 
        'genres' => $genres
        ];
        // dd($param);
        return view('shop_list', $param);
    }

    public function detail(Request $request)
    {
        $user = Auth::user();
        // dd($user);
        $form = $request->all();
        // dd($request);
        // dd($form);
        $details = Shop::where('id', $request->id)->get();
        $param = [
        'user' => $user,
        'details' => $details,
        ];
        // dd($param);
        return view('shop_detail', $param);
    }
}
