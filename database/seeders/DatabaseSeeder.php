<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;
use App\Models\Login;
use App\Models\Pelaksana;
Use App\Models\Pengguna;
use App\Models\Bulan;
use App\Models\Kategori;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        // ADMIN
        $token = Str::random(16);
        $role = "admin";
        $hashPassword = Hash::make('jancok', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        Login::create([
            'login_nama' => 'FathurWalkers',
            'login_username' => 'fathurwalkers',
            'login_password' => $hashPassword,
            'login_email' => 'fathurwalkers44@gmail.com',
            'login_telepon' => '085342072185',
            'login_token' => $hashToken,
            'login_level' => $role,
            'login_status' => "verified",
            'created_at' => now(),
            'updated_at' => now()
        ]);


        // ADMIN 1
        $token = Str::random(16);
        $role = "admin";
        $hashPassword = Hash::make('admin', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        Login::create([
            'login_nama' => 'Administrator',
            'login_username' => 'admin',
            'login_password' => $hashPassword,
            'login_email' => 'administrator@gmail.com',
            'login_telepon' => '083400592841',
            'login_token' => $hashToken,
            'login_level' => $role,
            'login_status' => "verified",
            'created_at' => now(),
            'updated_at' => now()
        ]);
        // ---------------------------------------------------------------------------

        // ---------------------------------------------------------------------------

        // User Pertama
        $token = Str::random(16);
        $role = "user";
        $hashPassword = Hash::make('user1', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        Login::create([
            'login_nama' => 'User 1',
            'login_username' => 'user1',
            'login_password' => $hashPassword,
            'login_email' => 'user1@gmail.com',
            'login_telepon' => '085342072185',
            'login_token' => $hashToken,
            'login_level' => $role,
            'login_status' => "verified",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // ---------------------------------------------------------------------------

        // User Kedua
        $token = Str::random(16);
        $role = "user";
        $hashPassword = Hash::make('user2', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        Login::create([
            'login_nama' => 'User 2',
            'login_username' => 'user2',
            'login_password' => $hashPassword,
            'login_email' => 'user2@gmail.com',
            'login_telepon' => '085342072185',
            'login_token' => $hashToken,
            'login_level' => $role,
            'login_status' => "verified",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // -----------------------------------------------------------

        // -----------------------------------------------------------

        // GENERATE BULAN
        $array_bulan = [
            "Muharram",
            "Shafar",
            "Rabiul Awal",
            "Rabiul Akhir",
            "Jumadil Awal" ,
            "Jumadil Akhir",
            "Rajab",
            "Sya'ban",
            "Ramadhan",
            "Syawal",
            "Dzulka'dah",
            "Dzulhijah",
        ];

        foreach ($array_bulan as $bul) {
            $bulan = new Bulan;
            $save_bulan = $bulan->create([
                'bulan_nama' => $bul,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $save_bulan->save();
        }

        // -----------------------------------------------------------

        // -----------------------------------------------------------

        // GENERATE KATEGORI
        $array_kategori = [
            'Adat',
            'Umum'
        ];

        foreach ($array_kategori as $kat) {
            $kategori = new Kategori;
            $save_kategori = $kategori->create([
                'kategori_nama' => $kat,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $save_kategori->save();
        }
    }
}
