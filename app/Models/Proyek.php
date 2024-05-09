<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // public function role ()
    // {
    //     return $this->belongsTo(Role::class);
    // }

    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    public function taskProyek()
    {
        return $this->hasMany(Task_proyek::class);
    }

    public function penerimaProyek()
    {
        return $this->hasMany(penerima_proyek::class);
    }
}
