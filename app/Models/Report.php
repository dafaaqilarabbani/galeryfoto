<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id',
        'foto_id',
        'keterangan'
    ];
    protected $table ='report';

    public function User()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
    public function Foto()
    {
        return $this->belongsTo(Foto::class, 'foto_id', 'id');
    }
}
