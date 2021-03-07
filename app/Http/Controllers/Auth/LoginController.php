<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Log;

class LoginController extends Controller
{
    // Login Masyarakat
    public function FormLoginMasyarakat()
    {
        return view('auth.login');
    }
    public function ActionLoginMasyarakat()
    {
        $auth = request()->only('username', 'password');
        if (Auth()->guard('masyarakat')->attempt($auth)) {
            return redirect()->to('/');
        } else {
            return redirect()->to('/login')->with('warning', 'Username / Password Salah !');
        }
    }

    // Login Petugas
    public function FormLoginPetugas()
    {
        return view('petugas.auth.login');
    }
    public function ActionLoginPetugas()
    {
        $auth = request()->only('username', 'password');
        if (Auth()->guard('petugas')->attempt($auth)) {
            Log::create([
                'event_log' => 'LOGIN',
                'table_name' => '-',
                'id_referensi' => '-',
                'id_petugas' => Auth()->guard('petugas')->user()->id_petugas,
                'desc' => 'Login Ke Aplikasi'
            ]);
            if (Auth()->guard('petugas')->user()->level == "Petugas") {
                return redirect()->to('/petugas');
            }
        } else {
            return redirect()->to('/petugas/login')->with('warning', 'Username / Password Salah !');
        }
    }

    // Login Admin
    public function FormLoginAdmin()
    {
        return view('admin.auth.login');
    }
    public function ActionLoginAdmin()
    {
        $auth = request()->only('username', 'password');
        if (Auth()->guard('admin')->attempt($auth)) {
            Log::create([
                'event_log' => 'LOGIN',
                'table_name' => '-',
                'id_referensi' => '-',
                'id_petugas' => Auth()->guard('admin')->user()->id_petugas,
                'desc' => 'Login Ke Aplikasi'
            ]);
            if (Auth()->guard('admin')->user()->level == "Admin") {
                return redirect()->to('/admin');
            } 
        } else {
            return redirect()->to('/admin/login')->with('warning', 'Username / Password Salah !');
        }
    }
}
