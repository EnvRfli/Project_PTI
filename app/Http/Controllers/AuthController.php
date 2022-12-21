<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function index()
    {
        if ($user = Auth::user()) {
            if ($user->role == 'admin') {
                return redirect()->intended('admin');
            } elseif ($user->role == 'author') {
                return redirect()->intended('author');
            }
        }
        return view('login');
    }

    public function masukinhewan(){
        return view('lupapassword');
    }

    public function lanjut2(Request $request){
       $data = $request->validate([
            'email'=>'required',
            'verification_q'=>'required',
            'password'=>'required',
        ]);

        $cek = DB::table('users')->where('email', $data['email'])->first();
        $veremail = DB::table('users')->select('email')->where('email', $data['email'])->first();
        $ver = DB::table('users')->select('verification_q')->where('email', $data['email'])->first();

        if($veremail = $data['email']){
            if($ver = $data['verification_q']){

                $hashing = bcrypt($data['password']);
                $konfirm = DB::table('users')->where('email', $data['email'])
                ->update([
                    'password'=>$hashing,
                ]);
                return redirect('login')->with('message', 'Berhasil mengganti Password');
            }
            else{
                return back()->with('message', 'email atau jawaban verifikasi salah');
            }
        }
        else{
            return back()->with('message', 'email atau jawaban verifikasi salah');
        } 
    }

    public function proses_login(Request $request)
    {
        request()->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ]);

        $kredensil = $request->only('email','password');

            if (Auth::attempt($kredensil)) {
                $user = Auth::user();
                if ($user->role == 'admin') {
                    return redirect()->intended('admin');
                } elseif ($user->role == 'author') {
                    return redirect()->intended('author');
                }
                return redirect()->intended('/');
            }

        return redirect('login')
                                ->withInput()
                                ->withErrors(['login_gagal' => 'These credentials do not match our records.']);
    }

    public function logout(Request $request)
    {
       $request->session()->flush();
       Auth::logout();
       return Redirect('login');
    }
}
