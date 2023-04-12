<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reserve;
use App\Models\Favorite;
use App\Models\Evaluate;
use App\Models\Shop;

class EvaluateController extends Controller
{

    public function evaluate(Request $request)
    {
        $form = $request->all();
        // dd($form);
        $evaluates = Evaluate::where('shop_id', $request->shop_id)->get();
        $shops = Shop::where('id', $request->shop_id)->get();
        $param = [
        'evaluates' => $evaluates,
        'shops' => $shops,
        ];
        // dd($param);
        return view('evaluate', $param);
    }

    public function return(Request $request)
    {
        return back();
    }


    public function post_evaluate(Request $request)
    {
        $user = Auth::user();
        // dd($user);
        $text = Auth::user()->name . 'さん';
        // dd($text);
        $reserves = Reserve::where('user_id', $user->id) -> get();
        // dd($reserves);
        $favorites = Favorite::where('user_id', $user->id) -> get();
        // dd($favorites);

        $inputs = $request->all();
        // dd($inputs);
        unset($inputs['_token']);

        $evaluate = Evaluate::where('user_id',$request->user_id)->where('shop_id',$request->shop_id)->first();

        if ($evaluate != null) {
            $text_evaluate = '同じ店舗の評価は2度投稿できません';
            $param = ['user' => $user, 'text' => $text, 'reserves' => $reserves, 'favorites' => $favorites, 'text_evaluate' => $text_evaluate];
            return view('/mypage', $param);
        } else {
            Evaluate::create($inputs);
            $text_evaluate = '評価の投稿が完了しました';
            // dd($text_evaluate);
            $param = ['user' => $user, 'text' => $text, 'reserves' => $reserves, 'favorites' => $favorites, 'text_evaluate' => $text_evaluate];
            return view('/mypage', $param);
        }
    }
}
