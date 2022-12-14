<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Agenda;

class Informasi extends Model
{
    use HasFactory;
    protected $table = "informasi";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function agenda()
    {
        return $this->belongsTo(Agenda::class);
    }
}
