<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\{Pengaduan, Masyarakat, Tanggapan, V_Masyarakat_Pengaduan, Logstatus, Log, ActivityLog};

class PetugasController extends Controller
{
    public function index()
    {
        $vmasyarakatpengaduan = V_Masyarakat_Pengaduan::latest('tanggal_pengaduan')->get();
        $activitylog = ActivityLog::latest('updated_at')->get();
        $pengaduan = Pengaduan::count();
        $log_status = Logstatus::latest('updated_at')->get();
        $proses = Pengaduan::where('status', 'Proses')->count();
        $selesai = Pengaduan::where('status', 'Selesai')->count();
        $masyarakat = Masyarakat::count();
        $tanggapan = Tanggapan::count();
        return view('petugas.index', compact('pengaduan', 'masyarakat', 'tanggapan', 'proses', 'selesai', 'vmasyarakatpengaduan', 'log_status', 'activitylog'));
    }
    public function showPengaduan()
    {
        $data_pengaduan = Pengaduan::with('masyarakat')->get();
        return view('petugas.pengaduan', compact('data_pengaduan'));
    }
    public function detailPengaduan($id)
    {
        $data_pengaduan = Pengaduan::with('masyarakat')->find($id);
        $data_tanggapan = Tanggapan::whereHas('pengaduan', function($query){
            $query->where('pengaduan_id', request()->route('id'));
        })->with('petugas')->first();
        return view('petugas.detailpengaduan', compact('data_pengaduan', 'data_tanggapan'));
    }
    public function destroyPengaduan($id)
    {
        Log::create([
            'event_log' => 'DELETE',
            'table_name' => 'Pengaduan',
            'id_referensi' => $id,
            'id_petugas' => Auth()->guard('petugas')->user()->id_petugas,
            'desc' => 'Menghapus Data'
        ]);
        $data_pengaduan = Pengaduan::with('masyarakat')->find($id);
        $data_pengaduan->delete();
        return redirect()->back()->with('success', 'Data Berhasil Dihapus !');
    }
    public function statusOnChange(Request $request, $id)
    {
        Log::create([
            'event_log' => 'UPDATE STATUS',
            'table_name' => 'Pengaduan',
            'id_referensi' => $id,
            'id_petugas' => Auth()->guard('petugas')->user()->id_petugas,
            'desc' => 'Update Status Pengaduan'
        ]);
        DB::select("CALL updateStatus($id, '$request->status')");
        return redirect()->back();
    }
    public function logout()
    {
        Log::create([
            'event_log' => 'LOGOUT',
            'table_name' => '-',
            'id_referensi' => '-',
            'id_petugas' => Auth()->guard('petugas')->user()->id_petugas,
            'desc' => 'Logout Dari Aplikasi'
        ]);
        Auth()->guard('petugas')->logout();
        return redirect()->to('/petugas/login');
    }
}
