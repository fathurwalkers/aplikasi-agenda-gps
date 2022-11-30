<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;
use App\Models\Login;
use App\Models\Pelaksana;
Use App\Models\Pengguna;
use App\Models\Bulan;
use App\Models\Agenda;
use App\Models\Informasi;

class AgendaController extends Controller
{
    public function daftar_agenda()
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $agenda = Agenda::all();
        return view('dashboard.daftar-agenda', [
            'users' => $users,
            'agenda' => $agenda,
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
}
