<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Agenda;

class Bulan extends Model
{
    use HasFactory;
    protected $table = "bulan";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function agenda()
    {
        return $this->hasMany(Agenda::class);
    }
}
