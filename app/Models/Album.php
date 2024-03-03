<?php

namespace App\Models;

use App\Models\Foto;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Psy\TabCompletion\Matcher\FunctionsMatcher;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Album extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id',
        'judul_album'
    ];

    protected $table = 'album';

    public function Foto() {
        return $this->hasMany(Foto::class, 'album_id', 'id');
    }
    public function User() {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
