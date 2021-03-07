<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Pengaduan, Masyarakat, Tanggapan, Log};
use Carbon\Carbon;

class TanggapanController extends Controller
{
    public function formTanggapan($id)
    {
        $detail_tanggapan = Pengaduan::with('masyarakat')->find($id);
        if (Auth()->guard('petugas')->check()) {
            return view('petugas.tanggapi', compact('detail_tanggapan'));
        } else {
            return view('admin.tanggapi', compact('detail_tanggapan'));
        }
        // return view('petugas.tanggapi', compact('detail_tanggapan'));
    }
    public function storeTanggapan()
    {
        Log::create([
            'event_log' => 'INSERT',
            'table_name' => 'Tanggapan',
            'id_referensi' => request()->get('pengaduan_id'),
            'id_petugas' => Auth()->guard('petugas')->user()->id_petugas,
            'desc' => 'Memberi Tanggapan Pengaduan'
        ]);
        $data_tanggapan = new Tanggapan();
        $data_tanggapan->pengaduan_id = request()->get('pengaduan_id');
        $data_tanggapan->tanggal_tanggapan = request()->get('tanggal_tanggapan');
        $data_tanggapan->tanggapan = request()->get('tanggapan');
        $data_tanggapan->petugas_id = Auth()->guard('petugas')->user()->id_petugas;
        $data_tanggapan->save();
        return redirect()->to('/petugas/pengaduan');
    }
    public function adminTanggapan()
    {
        Log::create([
            'event_log' => 'INSERT',
            'table_name' => 'Tanggapan',
            'id_referensi' => request()->get('pengaduan_id'),
            'id_petugas' => Auth()->guard('admin')->user()->id_petugas,
            'desc' => 'Memberi Tanggapan Pengaduan'
        ]);
        $data_tanggapan = new Tanggapan();
        $data_tanggapan->pengaduan_id = request()->get('pengaduan_id');
        $data_tanggapan->tanggal_tanggapan = request()->get('tanggal_tanggapan');
        $data_tanggapan->tanggapan = request()->get('tanggapan');
        $data_tanggapan->petugas_id = Auth()->guard('admin')->user()->id_petugas;
        $data_tanggapan->save();
        return redirect()->to('/admin/pengaduan')->with('success', 'Berhasil Menanggapi Pengaduan Laporan');
    }
}
