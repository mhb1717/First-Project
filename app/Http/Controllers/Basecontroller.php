<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Basecontroller extends Controller
{
    // public function home()
    // {
    //     return view('home');
    // }
    public function registor_page()
    {
        return view('registor');
    }
    public function login_page()
    {
        return view('login');
    }
    public function index()
    {
        return view('index');
    }
    public function registor(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6'
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("index")->withSuccess('You have signed-in');
    }
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'password' => Hash::make($data['password'])

        ]);
    }
    public function login(Request $request)
    {


        $credentials = $request->only('name', 'password');
        if (Auth::attempt($credentials)) {
            $data = $request->input();
            $request->session()->put('user', $data['name']);
            return redirect()->intended('index')
                ->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }
    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
