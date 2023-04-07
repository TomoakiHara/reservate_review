<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function favorite(Request $request)
    {        
        $inputs = $request->all();
        // dd($request);
        // dd($inputs);
        unset($inputs['_token']);
        Favorite::create($inputs);
        return back();
    }

    public function delete(Request $request)
    {
        $inputs = $request->all();
        // dd($request);
        // dd($inputs);
        unset($inputs['_token']);
        Favorite::where('user_id', $request->user_id)->where('shop_id', $request->shop_id)->delete($inputs);
        return back();
    }
}
