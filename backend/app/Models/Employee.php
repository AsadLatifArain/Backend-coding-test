<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Schedule()
    {
        return $this->hasOne(Schedule::class);
    }

    public function Attendance()
    {
        return $this->hasMany(Attendance::class);
    }
}
