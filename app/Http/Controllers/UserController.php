<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Reserve;
use App\Models\Shop;
use App\Models\Favorite;

class UserController extends Controller
{
    public function user()
    {
        return view('register');
    }

    public function register(UserRequest $request)
    {
        $name = $request->name;
        // dd($name);
        $email = $request->email;
        // dd($email);
        $password = $request->password;
        // dd($password);
        $inputs = ['name' => $name, 'email' => $email,
            'password' => Hash::make($password)];
        // dd($inputs);
        User::create($inputs);
        return view('thanks');
    }
    public function auth()
    {
        return view('login');
    }
    public function login(Request $request)
    {        
        $email = $request->email;
        // dd($email);
        $password = $request->password;
        // dd($password);
        if (Auth::attempt(['email' => $email,
            'password' => $password])) {
            $user = Auth::user();
            // dd($user);
            $text = Auth::user()->name . 'さん';
            // dd($text);
            $shops = Shop::all();
            // dd($shops);
            $reserves = Reserve::where('user_id', $user->id) -> get();
            // dd($reserves);
            $favorites = Favorite::where('user_id', $user->id) -> get();
            // dd($favorites);
            $text_evaluate = '評価の投稿をお願いします';
            // dd($text_evaluate);
            $param = ['shops' => $shops, 'user' => $user, 'text' => $text, 'reserves' => $reserves, 'favorites' => $favorites, 'text_evaluate' => $text_evaluate];
            return view('mypage', $param);
        } else {
            $text = 'メールアドレスまたはパスワードが間違っています';
            return view('login',['text' => $text]);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/auth');
    }
}
