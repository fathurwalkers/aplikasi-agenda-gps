<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bulan;
use App\Models\Kategori;

class Agenda extends Model
{
    use HasFactory;
    protected $table = "agenda";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function bulan()
    {
        return $this->belongsTo(Bulan::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
