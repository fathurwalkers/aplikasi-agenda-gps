<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;
use App\Models\Login;
Use App\Models\Pengguna;
use App\Models\Bulan;
use App\Models\Agenda;
use App\Models\Informasi;
use App\Models\Kategori;
use Illuminate\Support\Carbon;

class BulanController extends Controller
{
    public function daftar_bulan()
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $agenda = Agenda::all();
        $bulan = Bulan::all();
        $kategori = Kategori::all();
        return view('dashboard.daftar-bulan', [
            'users' => $users,
            'agenda' => $agenda,
            'bulan' => $bulan,
            'kategori' => $kategori,
        ]);
    }

    public function tambah_bulan(Request $request)
    {
        $bulan_id = $id;
        $bulan = new Bulan;
        $bulan_nama = $request->bulan_nama;
        $bulan_keterangan = $request->bulan_keterangan;

        $save_bulan = $bulan->create([
            'bulan_nama' => $bulan_nama,
            'bulan_keterangan' => $bulan_keterangan,
            'created_at'    => now(),
            'updated_at'    => now()
        ]);
        $save_bulan->save();
        return redirect()->route('daftar-bulan')->with('status', 'Berhasil melakukan Tambah bulan.');
    }

    public function ubah_bulan(Request $request, $id)
    {
        $bulan_id = $id;
        $bulan = Bulan::find($bulan_id);
        $bulan_nama = $request->bulan_nama;
        $bulan_keterangan = $request->bulan_keterangan;

        $update_bulan = $bulan->update([
            'bulan_nama' => $bulan_nama,
            'bulan_keterangan' => $bulan_keterangan,
            'updated_at'    => now()
        ]);
        return redirect()->route('daftar-bulan')->with('status', 'Berhasil melakukan update bulan.');
    }

    public function hapus_bulan(Request $request, $id)
    {
        $bulan_id = $id;
        $bulan = Bulan::find($bulan_id);
        $bulan_nama = $bulan->bulan_nama;
        $hapus_bulan = $bulan->forceDelete();
        if ($hapus_bulan == true) {
            $alert = "Bulan (" . $bulan_nama . ") telah berhasil dihapus.";
            return redirect()->route('daftar-bulan')->with('status', $alert);
        } else {
            $alert = "Bulan (" . $bulan_nama . ") gagal dihapus.";
            return redirect()->route('daftar-bulan')->with('status', $alert);
        }
    }
}
