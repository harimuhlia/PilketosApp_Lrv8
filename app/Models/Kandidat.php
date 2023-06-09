<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    use HasFactory;
    protected $table = "kandidats";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'pasangan_kandidat', 'keterangan',
        'visi_kandidat', 'misi_kandidat', 'foto_pasangan',
    ];
}
