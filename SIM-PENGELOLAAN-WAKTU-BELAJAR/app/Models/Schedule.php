<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['hari', 'jam_mulai', 'jam_selesai','materi','status','deskripsi'];
    public function assigmnet()
    {
        return $this->hasMany(Assigment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
