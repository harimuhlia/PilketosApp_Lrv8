<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = "kelas";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'kode_kelas', 'nama_kelas',
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
