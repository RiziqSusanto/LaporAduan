<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\{Admin, Pengaduan, Masyarakat, Tanggapan, V_Masyarakat_Pengaduan, Petugas, Logstatus, Log, ActivityLog};
use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activitylog = ActivityLog::latest('updated_at')->get();
        $vmasyarakatpengaduan = V_Masyarakat_Pengaduan::latest('tanggal_pengaduan')->paginate(5);
        $pengaduan = Pengaduan::count();
        $log_status = Logstatus::latest('updated_at')->get();
        $proses = Pengaduan::where('status', 'Proses')->count();
        $selesai = Pengaduan::where('status', 'Selesai')->count();
        $masyarakat = Masyarakat::count();
        $tanggapan = Tanggapan::count();
        return view('admin.index', compact('pengaduan', 'masyarakat', 'tanggapan', 'proses', 'selesai', 'vmasyarakatpengaduan', 'log_status', 'activitylog'));
    }
    public function tablePetugas()
    {
        $data_petugas = Petugas::all();
        return view('admin.petugas.index', compact('data_petugas'));
    }
    public function formPetugas()
    {
        return view('admin.petugas.create');
    }
    public function storePetugas()
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
        return redirect()->to('/admin/petugas')->with('success', 'Berhasil Tambah Data Petugas!');
    }
    public function destroyPetugas($id)
    {
        $data_petugas = Petugas::find($id);
        $data_petugas->delete();
        return redirect()->back()->with('success', 'Data Berhasil Dihapus !');
    }
    public function showPengaduan()
    {
        $data_pengaduan = Pengaduan::with('masyarakat')->get();
        return view('admin.pengaduan', compact('data_pengaduan'));
    }
    public function detailPengaduan($id)
    {
        $data_pengaduan = Pengaduan::with('masyarakat')->find($id);
        $data_tanggapan = Tanggapan::whereHas('pengaduan', function($query){
            $query->where('pengaduan_id', request()->route('id'));
        })->with('petugas')->first();
        return view('admin.detailpengaduan', compact('data_pengaduan', 'data_tanggapan'));
    }
    public function destroyPengaduan($id)
    {
        Log::create([
            'event_log' => 'DELETE',
            'table_name' => 'Pengaduan',
            'id_referensi' => $id,
            'id_petugas' => Auth()->guard('admin')->user()->id_petugas,
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
            'id_petugas' => Auth()->guard('admin')->user()->id_petugas,
            'desc' => 'Update Status Pengaduan'
        ]);
        // $data_pengaduan = Pengaduan::with('masyarakat')->find($id);
        // $data_pengaduan->status = request()->get('status');
        // $data_pengaduan->save();
        DB::select("CALL updateStatus($id, '$request->status')");
        return redirect()->back();
    }
    public function tableMasyarakat()
    {
        $data_masyarakat = Masyarakat::all();
        return view('admin.masyarakat.index', compact('data_masyarakat'));
    }
    public function formMasyarakat()
    {
        return view('admin.masyarakat.create');
    }
    public function storeMasyarakat()
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
        return redirect()->to('/admin/masyarakat')->with('success', 'Berhasil Tambah Data Masyarakat');
    }
    public function formEditMasyarakat($id)
    {
        $data_masyarakat = Masyarakat::find($id);
        return view('admin.masyarakat.edit', compact('data_masyarakat'));
    }
    public function destroyMasyarakat($id)
    {
        $data_masyarakat = Masyarakat::find($id);
        $data_masyarakat->delete();
        return redirect()->back()->with('success', 'Data Berhasil Dihapus !');
    }
    public function petugasPdf()
    {
        $data_petugas = Petugas::all();
        $pdf = PDF::loadView('admin.petugaspdf', compact('data_petugas'))->setPaper('a4', 'potrait');
        return $pdf->stream();
    }
    public function masyarakatPdf()
    {
        $data_masyarakat = Masyarakat::all();
        $pdf = PDF::loadView('admin.masyarakatpdf', compact('data_masyarakat'))->setPaper('a4', 'potrait');
        return $pdf->stream();
    }
    public function cetakPdf()
    {
        $data_pengaduan = Pengaduan::with('masyarakat')->get();
        $pdf = PDF::loadView('admin.pdf', compact('data_pengaduan'))->setPaper('a4', 'potrait');
        return $pdf->stream();
    }
    public function cetakDetailPdf($id)
    {
        $data_pengaduan = Pengaduan::with('masyarakat')->find($id);
        $data_tanggapan = Tanggapan::whereHas('pengaduan', function($query){
            $query->where('pengaduan_id', request()->route('id'));
        })->with('petugas')->first();
        $pdf = PDF::loadView('admin.detailpdf', compact('data_pengaduan', 'data_tanggapan'))->setPaper('a4', 'potrait');
        return $pdf->stream();
    }
    public function logout()
    {
        Log::create([
            'event_log' => 'LOGOUT',
            'table_name' => '-',
            'id_referensi' => '-',
            'id_petugas' => Auth()->guard('admin')->user()->id_petugas,
            'desc' => 'Logout Dari Aplikasi'
        ]);
        Auth()->guard('admin')->logout();
        return redirect()->to('/admin/login');
    }
}
