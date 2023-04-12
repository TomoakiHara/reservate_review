<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReserveRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Reserve;
use App\Models\Favorite;
use App\Models\Evaluate;

class ReserveController extends Controller
{
    public function reserve(ReserveRequest $request)
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

    public function edit(ReserveRequest $request)
    {
        $input = $request->all();
        // dd($input);
        unset($input['_token']);
        Reserve::where('id', $request->id)->update ($input);
        return back();
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
}
