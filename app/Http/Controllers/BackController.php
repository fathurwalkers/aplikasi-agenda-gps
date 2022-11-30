<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;
use App\Models\Login;
use App\Models\Informasi;
use App\Models\Agenda;
Use App\Models\Pengguna;
use App\Models\Bulan;

class BackController extends Controller
{
    protected $users;

    public function __construct()
    {
        $this->users = session('data_login');
    }

    public function daftar_akun()
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $akun = Login::where('login_level', '!=', 'admin')->get();
        return view('dashboard.daftar-akun', [
            'users' => $users,
            'akun' => $akun,
        ]);
    }

    public function data_akun()
    {
        $akun = Data::all();
        return view('akun.data-akun', [
            'akun' => $akun
        ]);
    }

    public function hapus_akun(Request $request)
    {
        $akun_id = $request->hapus_id;
        $akun = Data::find($akun_id);
        $login = Login::find($akun->login_id);
        $alert = "Berhasil menghapus Data Akun : " . $akun->data_nama;
        $login->forceDelete();
        return redirect()->route('data-akun')->with('status', $alert);
    }

    public function index()
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $agenda = Agenda::all()->count();
        $informasi = Informasi::all()->count();
        $pengguna = Pengguna::all()->count();
        $pengguna = Pengguna::all()->count();
        if($users->login_level == "user"){
            return redirect()->route('client')->with('status', 'Maaf anda tidak punya akses ke halaman Administrator.');
        }
        return view('dashboard.index', [
            'users'=> $users,
            'agenda'=> $agenda,
            'informasi'=> $informasi,
            'pengguna'=> $pengguna,
        ]);
    }

    public function login_admin()
    {
        $users = session('data_login');
        if ($users) {
            return redirect()->route('dashboard');
        }
        return view('login-admin');
    }

    public function login_client()
    {
        $users = session('data_login');
        if ($users) {
            return redirect()->route('client');
        }
        return view('login-client');
    }

    public function logout(Request $request)
    {
        $cek_logout_request = $request->logoutrequest;
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        switch ($users->login_level) {
            case 'admin':
                $users = session('data_login');
                $request->session()->forget(['data_login']);
                $request->session()->flush();
                return redirect()->route('login-admin')->with('status', 'Anda telah logout!');
                break;
            case 'user':
                $users = session('data_login');
                $request->session()->forget(['data_login']);
                $request->session()->flush();
                return redirect()->route('login-client')->with('status', 'Anda telah logout!');
                break;
            case 'pembina':
                $users = session('data_login');
                $request->session()->forget(['data_login']);
                $request->session()->flush();
                return redirect()->route('login-client')->with('status', 'Anda telah logout!');
                break;
        }
    }

    public function post_login(Request $request)
    {
        $cek_request = $request->cekrequest;
        $username = $request->login_username;
        $cari_user = Login::where('login_username', $username)->first();
        if ($cari_user == null) {
            return back()->with('status', 'Maaf username atau password salah!')->withInput();
        }
        $data_login = Login::where('login_username', $request->login_username)->firstOrFail();
        switch ($data_login->login_level) {
            case 'admin':
                if ($cek_request == "user") {
                    return redirect()->route('login-client')->with('status', 'Maaf anda tidak dapat masuk menggunakan akun Administrator pada Aplikasi Client, silahkan masuk ke Akun Administrator pada Halaman Administrator melalui Website');
                }
                $cek_password = Hash::check($request->login_password, $data_login->login_password);
                if ($data_login) {
                    if ($cek_password) {
                        $users = session(['data_login' => $data_login]);
                        return redirect()->route('dashboard')->with('status', 'Berhasil Login!');
                    }
                }
                break;
            case 'user':
                if ($cek_request == "admin") {
                    return redirect()->route('login-admin')->with('status', 'Maaf anda tidak dapat masuk menggunakan akun User pada Aplikasi Client, silahkan masuk ke Akun User pada Halaman User melalui Aplikasi Android');
                }
                $cek_password = Hash::check($request->login_password, $data_login->login_password);
                if ($data_login) {
                    if ($cek_password) {
                        $users = session(['data_login' => $data_login]);
                        return redirect()->route('client')->with('status', 'Berhasil Login!');
                    }
                }
                break;
            case 'pembina':
                if ($cek_request == "admin") {
                    return redirect()->route('login-admin')->with('status', 'Maaf anda tidak dapat masuk menggunakan akun User pada Aplikasi Client, silahkan masuk ke Akun User pada Halaman User melalui Aplikasi Android');
                }
                $cek_password = Hash::check($request->login_password, $data_login->login_password);
                if ($data_login) {
                    if ($cek_password) {
                        $users = session(['data_login' => $data_login]);
                        return redirect()->route('client')->with('status', 'Berhasil Login!');
                    }
                }
                break;
        }
        return back()->with('status', 'Maaf username atau password salah!')->withInput();
    }

    public function post_register(Request $request)
    {
        $validatedLogin                 = $request->validate([
            'login_nama'                => 'required',
            'login_username'            => 'required',
            'login_password'            => 'required',
            'login_email'               => 'required',
            'login_telepon'             => 'required',
            'login_alamat'              => 'required'
        ]);
        if ($validatedLogin["login_password"] !== $request->login_password2) {
            return back()->with('status', 'Password harus sama.')->withInput();
        }
        $hashPassword                   = Hash::make($validatedLogin["login_password"], [
            'rounds' => 12,
        ]);
        $token_raw                      = Str::random(16);
        $token                          = Hash::make($token_raw, [
            'rounds' => 12,
        ]);
        $level                          = "user";
        $login_status                   = "verified";
        $login_data                     = new Login;
        $save_login                     = $login_data->create([
            'login_nama'                => $validatedLogin["login_nama"],
            'login_username'            => $validatedLogin["login_username"],
            'login_password'            => $hashPassword,
            'login_email'               => $validatedLogin["login_email"],
            'login_telepon'             => $validatedLogin["login_telepon"],
            'login_alamat'              => $validatedLogin["login_alamat"],
            'login_token'               => $token,
            'login_level'               => $level,
            'login_status'              => $login_status,
            'created_at'                => now(),
            'updated_at'                => now()
        ]);
        $save_login->save();
        return redirect()->route('login')->with('status', 'Berhasil melakukan registrasi!');
    }
}
