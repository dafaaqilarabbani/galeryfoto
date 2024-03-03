<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id',
        'foto_id',
        'isi_komentar'
    ];
    protected $table = 'komentar';

    public function Foto() {
        return $this->belongsTo(Foto::class, 'foto_id', 'id');
    }
    public function User() {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
