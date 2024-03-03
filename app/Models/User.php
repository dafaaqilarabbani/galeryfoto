<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'username',
        'alamat',
        'tgl_lahir',
        'jenis_kelamin',
        'role',
        'password',
        'url',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function Foto() {
        return $this->hasMany(Foto::class, 'users_id', 'id');
    }
    public function Like() {
        return $this->hasOne(Like::class, 'users_id', 'id');
    }
    public function Komentar() {
        return $this->hasMany(Komentar::class, 'users_id', 'id');
    }
    public function Album() {
        return $this->hasMany(Album::class, 'users_id', 'id');
    }
    public function Followers() {
        return $this->hasMany(Followers::class, 'users_id', 'id_following');
    }
    public function Report() {
        return $this->hasMany(Report::class, 'users_id', 'id');
    }
}


