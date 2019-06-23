<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
   
    public function save(UsersRequest $request) { //登録処理
        $user = new User();
        if ($request->name) $user->name = $request->name;
        $user->password = Hash::make($request->password); //password_hashみたいなの
        $user->body = $request->body;
        $user->save();
        return redirect('/');
    }

    public function delete(Request $request) { //削除処理
        $user = User::findOrFail($request->id);
        if (Hash::check($request->password , $user->password)) { //password_verifyみたいなの
            User::destroy($user->id);
            return redirect('/');
        }
            $error = 'The password is incorrect';
            return view('confirm', ['error' => $error])->with('user', $user);
    }

    
}
