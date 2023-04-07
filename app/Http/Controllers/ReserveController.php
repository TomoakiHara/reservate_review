<?php

namespace App\Http\Controllers;

use App\Models\Reserve;
use Illuminate\Http\Request;
use App\Http\Requests\ReserveRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;
use App\Models\Evaluate;

class ReserveController extends Controller
{
    public function reserve(Request $request)
    {
        $inputs = $request->all();
        // dd($inputs);
        unset($inputs['_token']);
        Reserve::create($inputs);
        return view('reserve');
    }

    public function mypage()
    {
        $user = Auth::user();
        // dd($user);
        $text = Auth::user()->name . 'さん';
        // dd($text);
        $reserves = Reserve::where('user_id', $user->id) -> get();
        // dd($reserves);
        $favorites = Favorite::where('user_id', $user->id) -> get();
        // dd($favorites);
        $text_evaluate = '評価の投稿をお願いします';
        // dd($text_evaluate);
        $param = ['user' => $user, 'text' => $text, 'reserves' => $reserves, 'favorites' => $favorites, 'text_evaluate' => $text_evaluate];
            return view('mypage', $param);
    }

    public function cancel(Request $request)
    {
        $input = $request->all();
        // dd($request);
        // dd($input);
        unset($input['_token']);
        Reserve::where('id', $request->id)->delete($input);
        return redirect('/mypage');
    }

    public function post_evaluate(Request $request)
    {
        $inputs = $request->all();
        dd($inputs);
        unset($inputs['_token']);
        if (条件記載:shop_idとuser_idの組み合わせがテーブルデータと一致した場合) {
            $text_evaluate = '同じ店舗の評価は2度投稿できません';
            $param = ['text_evaluate' => $text_evaluate];
            return view('/mypage', $param);
        } else {
            Evaluate::create($inputs);
            $text_evaluate = '評価の投稿が完了しました';
            $param = ['text_evaluate' => $text_evaluate];
            return view('/mypage', $param);
        }
    }
}
