<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function loginView(){
        if(!session()->has('url.intended'))
    {
        session(['url.intended' => url()->previous()]);
    }
            return view('user.login');
        
    }

    public function loginLauncher(Request $request){

        $otentikasi = $request->validate([
            'email' =>'required|email:dns',
            'password' => 'required'
        ]);


        // KALAU BERHASIL
        if(Auth::attempt($otentikasi)){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back();
    }

    public function register(){
        return view('user.register', [
            "title"=>"Register"
        ]);
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'name'=>'required|max:255',
            'email'=>'required|email:dns|unique:users',
            'password'=>'required|min:5|max:255'
        ]);

        // enkripsi password
        $validateData['password'] = Hash::make($validateData['password']);
        User::create($validateData);

        // $request->session()->flash('success', 'registrasi berhasil');
        return view('user.login');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');

    }

    public function profiledetail(){
        $profile = User::find(Auth::user()->id);
        return view('user.profiledetail', compact('profile'));
    }

    public function editprofile(Request $request){
        $validateData = $request->validate([
            'name'=>'required|max:255',
            'email'=>'required|email:dns|unique:users',
            'password'=>'required|min:5|max:255'
        ]);
        dd("wo");

        
        $data_baru = array(
            'name' => $request->name,
            'email' => $request->email
        );

        // $data_baru->password = Hash::make($data_baru->password);
        $profile = User::find(Auth::user()->id);
        $profile->update($data_baru);
        return redirect('/');
        // $request->session()->flash('success', 'registrasi berhasil');
    }
}