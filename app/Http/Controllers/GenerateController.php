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
        //
    }
}
