<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assigment extends Model
{
    protected $fillable = [
        'name',
        'deskripsi',
        'status',
        'deadline',
        'prioritas',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
