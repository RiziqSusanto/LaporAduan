<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{Masyarakat, Petugas};

class RegisterController extends Controller
{
    // Register Masyarakat
    public function FormRegisterMasyarakat()
    {
        return view('auth.register');
    }
    public function ActionRegisterMasyarakat()
    {
        request()->validate([
            'nik' => 'required|unique:masyarakats',
            'nama' => 'required',
            'username' => 'required|unique:masyarakats',
            'password' => 'required',
            'telp' => 'required',
        ]);
        $data_masyarakat = new Masyarakat();
        $data_masyarakat->nik = request()->get('nik');
        $data_masyarakat->nama = request()->get('nama');
        $data_masyarakat->username = request()->get('username');
        $data_masyarakat->password = bcrypt(request()->get('password'));
        $data_masyarakat->telp = request()->get('telp');
        $data_masyarakat->save();
        return redirect()->to('/register')->with('success', 'Masyarakat Berhasil Registrasi');
    }

    // Register Admin dan Petugas
    public function FormRegisterAdmin()
    {
        return view('admin.auth.register');
    }
    public function ActionRegisterAdmin()
    {
        request()->validate([
            'nama_petugas' => 'required',
            'username' => 'required|unique:petugas',
            'password' => 'required',
            'telp' => 'required',
            'level' => 'required'
        ]);
        $data_admin = new Petugas();
        $data_admin->nama_petugas = request()->get('nama_petugas');
        $data_admin->username = request()->get('username');
        $data_admin->password = bcrypt(request()->get('password'));
        $data_admin->telp = request()->get('telp');
        $data_admin->level = request()->get('level');
        $data_admin->save();
        return redirect()->to('/admin/register')->with('success', 'Berhasil Registrasi Akun!');
    }
}
