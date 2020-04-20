<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class sqlDbClassController extends Controller
{
	public function case1(Request $request){
		DB::connection()->enableQueryLog();
		// クエリビルダで起きるSQLインジェクション
		$sql = "SELECT * FROM users WHERE email='".$request->email."' AND password='".$request->password."';";
		$users = DB::select($sql);
		var_dump(\DB::getQueryLog());
		return view('query.case1', ['users' => $users]);
	}

	public function case2(Request $request){
		// PDOクラスのバインド変数を使う正しい書き方
		$sql = "SELECT * FROM users WHERE email=? AND password=?;";
		$data = [ $request->email, $request->password ];
		$users = DB::select($sql, $data);
		return view('query.case2', ['users' => $users]);
	}

	public function case3(Request $request){
		// PDOクラスのバインド変数を使う正しい書き方
		$sql = "SELECT * FROM users WHERE email=:email AND password=:password;";
		$data = [
			'email' => $request->email,
			'password' => $request->password,
		];
		$users = DB::select($sql, $data);
		return view('query.case2', ['users' => $users]);
	}

	public function case4(Request $request){
		// テーブル指定
		$users = DB::table('users')->where('email', $request->email)->where('password', $request->password)->get();
		return view('query.case1', ['users' => $users]);
	}

}
