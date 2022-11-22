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
        $siswa = Siswa::where('login_id', $users->id)->first();
        return view('client.index', [
            'users' => $users,
            'siswa' => $siswa,
        ]);
    }
}
