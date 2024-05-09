<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasFactory;

    protected $guarded = ['id'];

    public function role ()
    {
        return $this->belongsTo(Role::class, 'foreign_key');
    }

    public function proyek ()
    {
        return $this->hasMany(Proyek::class);
    }

    public function penerimaProyek()
    {
        return $this->hasMany(penerima_proyek::class);
    }


}

