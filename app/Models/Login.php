<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pengguna;

class Login extends Model
{
    use HasFactory;
    protected $table = "login";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function pengguna()
    {
        return $this->hasMany(Pengguna::class);
    }
}
