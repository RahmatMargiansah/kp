<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
     public function index()
    {
        $user = User::all();
        return view('user', ['userList' => $user]);
    }

    public function register()
    {
        return view('/register');
    }

    public function registerProcess(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|max:255',
            'role_id'=> 'required',
        ]);

        $request['password'] = Hash::make($request->password);
        $user = User::create($request->all());

        Session::flash('status', 'success');
        Session::flash('message', 'Register Berhasil');

        return redirect('/register');
    }

    public function login()
    {
    	return view('login');
    }

    public function authenticating(Request $request)
    {
    	$credentials = $request->validate([
    		'email' => ['required', 'email'],
    		'password' => ['required'],
    	]);

    	if (Auth::attempt($credentials)) {
    		if(Auth::user()->role_id == 1) {
                return redirect('admin');
             }

           if (Auth::user()->role_id == 2) {
                return redirect('teknisi');
           }

            if (Auth::user()->role_id == 3) {
                return redirect('manager');
           }
       }

    	Session::flash('status', 'failed');
    	Session::flash('status', 'Login Gagal!');

    	return redirect('/login');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        return view('register-delete', ['user' => $user]);
    }

    public function destroy($id)
    {
        $deleteUser = User::findOrFail($id);
        $deleteUser->delete();

        if($deleteUser) {
            Session::flash('status', 'success');
            Session::flash('message', 'Delete Akun Berhasil');
        }

        return redirect('user');
    }

    public function logout(Request $request)
    {
    	Auth::logout();
    	$request->session()->invalidate();
    	$request->session()->regenerateToken();
    	return redirect('/login');
    }

}
