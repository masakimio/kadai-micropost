<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // 追加

class UsersController extends Controller
{
    public function index()
    {
        
        
        // ユーザ一覧をidの降順で取得
        $users = User::orderBy('id', 'desc')->paginate(10);

        // ユーザ一覧ビューでそれを表示
        return view('users.index', [
            'users' => $users,
        ]);
    }
    
    public function show($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);
        
        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();
        
        // ユーザの投稿一覧を作成日時の降順で取得
        $microposts = $user->microposts()->orderBy('created_at', 'desc')->paginate(10);

        // ユーザ詳細ビューでそれを表示
        return view('users.show', [
            'user' => $user,
            'microposts' => $microposts,
        ]);
    }
    
    public function edit($id)
    {
        $user = User::findOrFail($id);
        
        return view('users.edit', [
            'user' => $user,
            ]);
    }
    
    public function update(Request $request, $id)
    {
        
        $request->validate([
                'name' => 'required|max:20',
                'introduction' => 'max:255',
         ]);
        // idの値でメッセージを検索して取得
        $user = User::findOrFail($id);
        // メッセージを更新
        $user->name = $request->name;
        $user->introduction = $request->introduction;
        $user->save();

        // トップページへリダイレクトさせる
        return redirect('/');
    }
    
    public function destroy($id)
    {
        // idの値でメッセージを検索して取得
        $user = User::findOrFail($id);
    
            $user->delete();
        return redirect('/');
    
    }
   
    public function confirm($id)
    {
        $user = User::findOrFail($id);
        
        return view('users.confirm', [
            'user' => $user,
            ]);
    }
    
    public function followings($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);

        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();

        // ユーザのフォロー一覧を取得
        $followings = $user->followings()->paginate(10);

        // フォロー一覧ビューでそれらを表示
        return view('users.followings', [
            'user' => $user,
            'users' => $followings,
        ]);
    }
    
    /**
     * ユーザのフォロワー一覧ページを表示するアクション。
     *
     * @param  $id  ユーザのid
     * @return \Illuminate\Http\Response
     */
    public function followers($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);

        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();

        // ユーザのフォロワー一覧を取得
        $followers = $user->followers()->paginate(10);

        // フォロワー一覧ビューでそれらを表示
        return view('users.followers', [
            'user' => $user,
            'users' => $followers,
        ]);
    }
    public function favorites($micropost_id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($micropost_id);

        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();

        // ユーザのfavー一覧を取得
        $favorites = $user->favorites()->paginate(10);

        // fav一覧ビューでそれらを表示
        return view('users.favorites', [
            'user' => $user,
            //'users' => $favorites,
            'microposts' => $favorites,
        ]);
    }
    
}
