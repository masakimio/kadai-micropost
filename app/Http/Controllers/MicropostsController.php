<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MicropostsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            // ユーザとフォロー中ユーザの投稿の一覧を作成日時の降順で取得
            $microposts = $user->feed_microposts()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'microposts' => $microposts,
            ];
        }

        // Welcomeビューでそれらを表示
        return view('welcome', $data);
    }
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'content' => 'required|max:255',
        ]);

        // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        $request->user()->microposts()->create([
            'content' => $request->content,
        ]);

        // 前のURLへリダイレクトさせる
        return back();
    }
    public function edit($id)
    {
        // idの値でメッセージを検索して取得
        $micropost = \App\Micropost::findOrFail($id);

       // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を編集
        if (\Auth::id() === $micropost->user_id) {
            return view('microposts.edit', [
            'micropost' => $micropost,
        ]);
        }
    }
    
    public function update(Request $request, $id)
    {
        // バリデーション
        $request->validate([
            'content' => 'required|max:255',
        ]);
         $micropost = \App\Micropost::findOrFail($id);
        // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        $micropost->content = $request->content;
        $micropost->save();
        // 前のURLへリダイレクトさせる
        return redirect('/');
    }
    
    
    public function destroy($id)
    {
        // idの値で投稿を検索して取得
        $micropost = \App\Micropost::findOrFail($id);

        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() === $micropost->user_id) {
            $micropost->delete();
        }

        // 前のURLへリダイレクトさせる
        return redirect('/');
    }
    
    public function confirm($id)
    {
        // idの値でメッセージを検索して取得
        $micropost = \App\Micropost::findOrFail($id);

       // 認証済みユーザ（閲覧者）がその投稿の所有者である場合
        if (\Auth::id() === $micropost->user_id) {
            return view('microposts.confirm', [
            'micropost' => $micropost,
            ]);
        }
    }
    
}
