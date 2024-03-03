<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id',
        'foto_id'
    ];

    protected $table = 'like';

    public function Foto() {
        return $this->belongsTo(Foto::class, 'foto_id', 'id');
    }
    public function User() {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
