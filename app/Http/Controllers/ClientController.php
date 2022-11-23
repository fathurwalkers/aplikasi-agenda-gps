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

class ClientController extends Controller
{
    protected $users;

    public function __construct()
    {
        $this->users = session('data_login');
    }

    public function index()
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        if($users->login_level == "admin"){
            return redirect()->route('dashboard')->with('status', 'Maaf anda tidak punya akses ke Aplikasi Client.');
        }
        $pengguna = Pengguna::where('login_id', $users->id)->first();
        return view('client.index', [
            'users' => $users,
            'pengguna' => $pengguna,
        ]);
    }

    public function client_profile()
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $pengguna = Pengguna::where('login_id', $users->id)->first();
        return view('client.client-profile', [
            'users' => $users,
            'pengguna' => $pengguna,
        ]);
    }

    public function client_ubah_foto(Request $request)
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $pengguna = Pengguna::where('login_id', $users->id)->first();
        $gambar_cek = $request->file('foto');
        $pengguna_foto = $pengguna->pengguna_foto;
        if ($gambar_cek == NULL) {
            return redirect()->route('client')->with('status', 'Maaf anda tidak memasukkan foto apapun. silahkan lakukan kembali dengan memasukkan foto.');
        } else {
            $randomNamaGambar = Str::random(10) . '.jpg';
            $gambar = $request->file('foto')->move(public_path('assets'), strtolower($randomNamaGambar));
        }
        $pengguna_update = $pengguna->update([
            'pengguna_foto' => $gambar->getFilename(),
            'updated_at' => now()
        ]);
        return redirect()->route('client-profile');
    }
}
