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
}