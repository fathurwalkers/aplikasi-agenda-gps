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

class InformasiController extends Controller
{
    public function daftar_informasi()
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $informasi = Informasi::all();
        $bulan = Bulan::all();
        $agenda = Agenda::all();
        $kategori = Kategori::all();
        return view('dashboard.daftar-informasi', [
            'users' => $users,
            'informasi' => $informasi,
            'agenda' => $agenda,
            'bulan' => $bulan,
            'kategori' => $kategori,
        ]);
    }

    public function tambah_informasi(Request $request)
    {
        $informasi = new Informasi;
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $informasi_agenda = $request->informasi_agenda;
        $informasi_judul = $request->informasi_judul;
        $informasi_isi = $request->informasi_isi;
        $informasi_tanggal = $request->informasi_tanggal;
        $informasi_waktu = $request->informasi_waktu;
        if ($informasi_tanggal !== NULL || $informasi_waktu !== NULL) {
            $informasi_tanggal_waktu = Carbon::createFromFormat('d-m-Y H:i',Carbon::parse($request->informasi_tanggal)->format('d-m-Y') . " " . $request->informasi_waktu);
        } else {
            return redirect()->route('daftar-informasi')->with('status', 'Maaf, Tanggal dan Waktu tidak boleh kosong.');
        }
        $agenda = Agenda::find($informasi_agenda);
        $save_informasi = $informasi->create([
            'informasi_judul' => $informasi_judul,
            'informasi_isi' => $informasi_isi,
            'informasi_status' => "AKTIF",
            'informasi_waktu' => $informasi_tanggal_waktu,
            'agenda_id' => $agenda->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $cek_save_informasi = $save_informasi->save();
        if ($cek_save_informasi == true) {
            $alert = "Data Informasi (" . $informasi_judul . ") telah berhasil ditambahkan.";
            return redirect()->route('daftar-informasi')->with('status', $alert);
        } else {
            $alert = "Data Informasi (" . $informasi_judul . ") gagal ditambahkan.";
            return redirect()->route('daftar-informasi')->with('status', $alert);
        }
    }

    public function ubah_informasi(Request $request, $id)
    {
        $informasi_id = $id;
        $informasi = Informasi::find($informasi_id);
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $informasi_agenda = $request->informasi_agenda;
        $informasi_judul = $request->informasi_judul;
        $informasi_isi = $request->informasi_isi;
        $informasi_tanggal = $request->informasi_tanggal;
        $informasi_waktu = $request->informasi_waktu;
        if ($informasi_tanggal !== NULL || $informasi_waktu !== NULL) {
            $informasi_tanggal_waktu = Carbon::createFromFormat('d-m-Y H:i',Carbon::parse($request->informasi_tanggal)->format('d-m-Y') . " " . $request->informasi_waktu);
        } else {
            $informasi_tanggal_waktu = $informasi->informasi_waktul;
        }
        $id_agenda = intval($informasi_agenda);
        $agenda = Agenda::find($id_agenda);
        $update_informasi = $informasi->update([
            'informasi_judul' => $informasi_judul,
            'informasi_isi' => $informasi_isi,
            'informasi_status' => "AKTIF",
            'informasi_waktu' => $informasi_tanggal_waktu,
            'agenda_id' => $agenda->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        if ($update_informasi == true) {
            $alert = "Data Informasi (" . $informasi_judul . ") telah berhasil diubah.";
            return redirect()->route('daftar-informasi')->with('status', $alert);
        } else {
            $alert = "Data Informasi (" . $informasi_judul . ") gagal diubah.";
            return redirect()->route('daftar-informasi')->with('status', $alert);
        }
    }

    public function hapus_informasi(Request $request, $id)
    {
        $informasi_id = $id;
        $informasi = Informasi::find($informasi_id);
        $informasi_judul = $informasi->informasi_judul;
        $hapus_informasi = $informasi->forceDelete();
        if ($hapus_informasi == true) {
            $alert = "Agenda Kegiatan (" . $informasi_judul . ") telah berhasil dihapus.";
            return redirect()->route('daftar-agenda')->with('status', $alert);
        } else {
            $alert = "Agenda Kegiatan (" . $informasi_judul . ") gagal dihapus.";
            return redirect()->route('daftar-agenda')->with('status', $alert);
        }
    }
}
