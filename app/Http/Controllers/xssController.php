<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class xssController extends Controller
{
	public function case1(Request $request){
		// PHP標準の関数でエスケープせずに出力する
		echo $request->param;
	}

	public function case2(Request $request){
		// Viewの中でエスケープせずに出力する
		return view('xss.case2', ['param'=>$request->param]);
	}

	public function case3(Request $request){
		// 正しい例
		return view('xss.case3', ['param'=>$request->param]);
	}
}
