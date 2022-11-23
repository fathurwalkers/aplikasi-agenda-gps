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

class GenerateController extends Controller
{
    public function generate_pengguna()
    {
        $faker                  = Faker::create('id_ID');
        for ($i=0; $i < 35; $i++) {
            $pengguna = new Pengguna;
            $login = new Login;
            $array_gender = ["L", "P"];
            $foto = "default-user.png";
            $gender = Arr::random($array_gender);
            $telepon = $faker->phoneNumber();
            $status = "AKTIF";
            $alamat = $faker->address();
            switch ($gender) {
                case "L":
                    $nama = $faker->firstNameMale() . " " . $faker->lastNameMale();
                    break;
                case "P":
                    $nama = $faker->firstNameFemale() . " " . $faker->lastNameFemale();
                    break;
            }

            // GENERATE DATA LOGIN
            $token = Str::random(16);
            $level = "user";
            $hashPassword = Hash::make('12345', [
                'rounds' => 12,
            ]);
            $hashToken = Hash::make($token, [
                'rounds' => 12,
            ]);
            $username = strtolower(Str::random(10));
            $save_login = $login->create([
                'login_nama'        => $nama,
                'login_username'    => $username,
                'login_password'    => $hashPassword,
                'login_email'       => $faker->email(),
                'login_telepon'     => $telepon,
                'login_token'       => $hashToken,
                'login_level'       => $level,
                'login_status'      => "verified",
                'created_at'        => now(),
                'updated_at'        => now()
            ]);
            $save_login->save();

            // GENERATE DATA PENGGUNA
            $save_pengguna = $pengguna->create([
                'pengguna_nama' => $nama,
                'pengguna_jeniskelamin' => $gender,
                'pengguna_alamat' => $alamat,
                'pengguna_telepon' => $telepon,
                'pengguna_foto' => $foto,
                'pengguna_status' => $status,
                'login_id' => $save_login->id,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $save_pengguna->save();
        }
    }

    public function generate_agenda()
    {
        $faker                  = Faker::create('id_ID');
        $bulan = Bulan::all()->toArray();
        $array_lat = [
            '5.487045',
            '5.490170',
            '5.493811',
            '5.496801',
            '5.496855'
        ];
        $array_long = [
            '122.581907',
            '122.577541',
            '122.575308',
            '122.579934',
            '122.576307'
        ];

        $array_tempat = [
            'Kelurahan Lipu',
            'Keraton',
            'Kantor Walikota',
            'Palagimata',
            'Universitas Dayanu Ikhsanuddin'
        ];

        $array_nama_agenda = [
            "Agenda Adat",
            "Acara Adat",
            "Acara Umum",
            "Agenda Umum",
            "Acara Pernikahan"
        ];

        $array_status = [
            'BERLANGSUNG',
            'SELESAI',
            'PENDING',
        ];

        $iter = 0;
        foreach ($array_tempat as $tempat) {
            $iter =+ 1;
            $agenda = new Agenda;
            $random_bulan = Arr::random($bulan);
            $random_status = Arr::random($array_status);
            $save_agenda = $agenda->create([
                "agenda_nama" => $array_nama_agenda[$iter],
                "agenda_tempat" => $tempat,
                "agenda_keterangan" => $faker->paragraph(4),
                "agenda_lat" => $array_lat[$iter],
                "agenda_long" => $array_long[$iter],
                "agenda_status" => "",
                "agenda_penyelenggara" => $random_status,
                "agenda_waktu" => now(),
                "bulan_id" => $random_bulan["id"],
                "created_at" => now(),
                "updated_at" => now()
            ]);
            $save_agenda->save();
            // dd($save_agenda);
        }
    }
}
