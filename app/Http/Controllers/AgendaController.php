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

class AgendaController extends Controller
{
    public function daftar_agenda()
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $agenda = Agenda::all();
        $bulan = Bulan::all();
        $kategori = Kategori::all();
        return view('dashboard.daftar-agenda', [
            'users' => $users,
            'agenda' => $agenda,
            'bulan' => $bulan,
            'kategori' => $kategori,
        ]);
    }

    public function hapus_agenda(Request $request, $id)
    {
        $agenda_id = $id;
        $agenda = Agenda::find($agenda_id);
        $informasi = Informasi::where('agenda_id', $agenda->id)->get();
        if ($informasi->count() !== 0) {
            foreach ($informasi as $info) {
                $find_info = Informasi::find($info->id);
                $hapus_info = $find_info->forceDelete();
            }
        }
        $agenda_nama = $agenda->agenda_nama;
        $agenda_tempat = $agenda->agenda_tempat;
        $hapus_agenda = $agenda->forceDelete();
        if ($hapus_agenda == true) {
            $alert = "Agenda Kegiatan (" . $agenda_nama . ") di (" . $agenda_tempat . ") telah berhasil dihapus.";
            return redirect()->route('daftar-agenda')->with('status', $alert);
        } else {
            $alert = "Agenda Kegiatan (" . $agenda_nama . ") di (" . $agenda_tempat . ") gagal dihapus.";
            return redirect()->route('daftar-agenda')->with('status', $alert);
        }
    }

    public function tambah_agenda(Request $request)
    {
        $agenda = new Agenda;
        $session_users = session('data_login');
        $users = Login::find($session_users->id);

        $agenda_kategori = $request->agenda_kategori;
        $agenda_bulan = $request->agenda_bulan;
        $agenda_nama = $request->agenda_nama;
        $agenda_tempat = $request->agenda_tempat;
        $agenda_keterangan = $request->agenda_keterangan;
        $agenda_penyelenggara = $request->agenda_penyelenggara;
        $agenda_tanggal = $request->agenda_tanggal;
        $agenda_waktu = $request->agenda_waktu;
        $agenda_latlong = $request->agenda_latlong;
        $agenda_tanggal_waktu = Carbon::createFromFormat('d-m-Y H:i',Carbon::parse($request->agenda_tanggal)->format('d-m-Y') . " " . $request->agenda_waktu);
        $explode1 = explode("LatLng(", $agenda_latlong);
        $explode2 = explode(")", $explode1[1]);
        $explode3 = explode(", ", $explode2[0]);
        $agenda_lat = $explode3[0];
        $agenda_long = $explode3[1];
        $save_agenda = $agenda->create([
            "agenda_nama" => $agenda_nama,
            "agenda_tempat" => $agenda_tempat,
            "agenda_keterangan" => $agenda_keterangan,
            "agenda_lat" => $agenda_lat,
            "agenda_long" => $agenda_long,
            "agenda_status" => "BERLANGSUNG",
            "agenda_penyelenggara" => $agenda_penyelenggara,
            "agenda_waktu" => $agenda_tanggal_waktu,
            "bulan_id" => intval($agenda_bulan),
            "kategori_id" => 1,
            "created_at" => now(),
            "updated_at" => now()
        ]);
        $cek_save_agenda = $save_agenda->save();
        if ($cek_save_agenda == true) {
            $alert = "Data Agenda Kegiatan (" . $agenda_nama . ") di (" . $agenda_tempat . ") telah berhasil ditambahkan.";
            return redirect()->route('daftar-agenda')->with('status', $alert);
        } else {
            $alert = "Data Agenda Kegiatan (" . $agenda_nama . ") di (" . $agenda_tempat . ") gagal ditambahkan.";
            return redirect()->route('daftar-agenda')->with('status', $alert);
        }
    }

    public function ubah_agenda(Request $request, $id)
    {
        $agenda_id = $id;
        $agenda = Agenda::find($agenda_id);
        $session_users = session('data_login');
        $users = Login::find($session_users->id);

        $agenda_kategori = $request->agenda_kategori;
        $agenda_bulan = $request->agenda_bulan;
        $agenda_nama = $request->agenda_nama;
        $agenda_tempat = $request->agenda_tempat;
        $agenda_keterangan = $request->agenda_keterangan;
        $agenda_penyelenggara = $request->agenda_penyelenggara;
        $agenda_tanggal = $request->agenda_tanggal;
        $agenda_waktu = $request->agenda_waktu;

        if ($agenda_waktu !== NULL || $agenda_tanggal !== NULL) {
            $agenda_tanggal_waktu = Carbon::createFromFormat('d-m-Y H:i',Carbon::parse($request->agenda_tanggal)->format('d-m-Y') . " " . $request->agenda_waktu);
        } else {
            $agenda_tanggal_waktu = $agenda->agenda_waktu;
        }

        $update_agenda = $agenda->update([
            "agenda_nama" => $agenda_nama,
            "agenda_tempat" => $agenda_tempat,
            "agenda_keterangan" => $agenda_keterangan,
            "agenda_status" => "BERLANGSUNG",
            "agenda_penyelenggara" => $agenda_penyelenggara,
            "agenda_waktu" => $agenda_tanggal_waktu,
            "bulan_id" => intval($agenda_bulan),
            "kategori_id" => 1,
            "updated_at" => now()
        ]);
        if ($update_agenda == true) {
            $alert = "Data Agenda Kegiatan (" . $agenda_nama . ") di (" . $agenda_tempat . ") telah berhasil ditambahkan.";
            return redirect()->route('daftar-agenda')->with('status', $alert);
        } else {
            $alert = "Data Agenda Kegiatan (" . $agenda_nama . ") di (" . $agenda_tempat . ") gagal ditambahkan.";
            return redirect()->route('daftar-agenda')->with('status', $alert);
        }
    }
}
