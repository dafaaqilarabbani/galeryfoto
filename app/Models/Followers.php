<?php

namespace App\Models;

use App\Models\Foto;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Followers extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'id_following'
    ];

    protected $table = 'followers';

    public function Foto()
    {
        return $this->belongsTo(Foto::class,'foto_id','id');
    }
    //nilai balik ke user
    public function User()
    {
        return $this->belongsTo(User::class,'users_id','id');
        return $this->hasMany(User::class,'id_following','id');
        
    }
}
