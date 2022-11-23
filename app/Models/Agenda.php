<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bulan;

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
}
