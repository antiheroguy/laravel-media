<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AuthController extends Controller
{
    public function getLogin() {
    	if (Auth::check()) {
            return redirect('admin');
        }
        return view('admin.page.login');
    }

    public function postLogin(Request $request) {
    	if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember ? true : false)) {
    		return redirect('admin');
    	}
    	return back()->with('status', 'The email address or password is incorrect. Please try again');
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('login');
    }
}
