<?php

namespace App\Models;

use App\Models\Album;
use Illuminate\Database\Eloquent\Model;
use Psy\TabCompletion\Matcher\FunctionsMatcher;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Foto extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id',
        'album_id',
        'url',
        'judul_foto',
        'deskripsi'
    ];
    protected $table = 'foto';

    public function User() {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
    public function Album() {
        return $this->belongsTo(Album::class, 'album_id', 'id');
    }
    public Function Like(){
        return $this->hasMany(Like::class, 'foto_id', 'id');
    }
    public function Komentar() {
        return $this->hasMany(Komentar::class, 'foto_id', 'id');
    }
    public function Report() {
        return $this->hasOne(Report::class , 'foto_id' ,'id');
    }
}
