<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Votting extends Model
{
    use HasFactory;
    protected $table = "vottings";
    protected $primaryKey = "id";
    protected $fillable = [
        'user_id', 'kandidat_id', 'created_at', 'updated_at'
    ];
}
