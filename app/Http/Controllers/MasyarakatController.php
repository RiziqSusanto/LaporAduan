<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\{Pengaduan, Masyarakat, Tanggapan, Petugas};
use Illuminate\Http\Request;
use Image;
use Carbon\Carbon;
use File;

class MasyarakatController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function FormPengaduan()
    {
        return view('formpengaduan');
    }

    public function simpanPengaduan()
    {
        DB::beginTransaction();
        try {
            //code...
            request()->validate([
                'isi_laporan' => 'required',
                'foto' => 'image|required|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            $foto = request()->file('foto');
            $filename = $foto->getClientOriginalName();
            $foto->move(public_path().'/images/',$filename);
            $foto_compress = Image::make(public_path().'/images/'.$filename);
            $foto_compress->resize(800, 800, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });;
            $foto_compress->save(public_path('/img/'.$filename));
            unlink(public_path('/images/'.$filename));        
            // $data_pengaduan = Pengaduan::create(request()->all());
            $data_pengaduan = new Pengaduan();
            $data_pengaduan->tanggal_pengaduan = request()->get('tanggal_pengaduan');
            $data_pengaduan->masyarakat_nik = Auth()->guard('masyarakat')->user()->nik;
            $data_pengaduan->isi_laporan = request()->get('isi_laporan');
            $data_pengaduan->foto = $filename;
            $data_pengaduan->save();
            DB::commit();
            return redirect()->to('/data_pengaduan');
        } catch (\Throwable $e) {
            DB::rollback();
            return redirect('/data_pengaduan')->with('error', 'Gagal Lapor');

        }
    }
    public function dataPengaduan()
    {
        $id = Auth()->guard('masyarakat')->user()->nik;
        $queries = DB::select("SELECT check_pengaduan_masyarakat($id)")[0];
        // dd($queries);
        $data_pengaduan = Auth()->guard('masyarakat')->user()->pengaduans;
        return view('datapengaduan', compact('data_pengaduan', 'queries'));
    }
    public function detailPengaduan($id)
    {
        $detail_pengaduan = Pengaduan::with('masyarakat')->find($id);
        $data_tanggapan = Tanggapan::whereHas('pengaduan', function($query){
            $query->where('pengaduan_id', request()->route('id'));
        })->with('petugas')->first();
        return view('detailpengaduan', compact('detail_pengaduan', 'data_tanggapan'));
    }
    public function logout()
    {
        Auth()->guard('masyarakat')->logout();
        return redirect()->to('/');
    }
}
