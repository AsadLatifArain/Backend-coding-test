<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function Shift()
    {
        return $this->belongsTo(Shift::class);
    }

    public function Location()
    {
        return $this->belongsTo(Location::class);
    }

    public function Attendance()
    {
        return $this->hasOne(Attendacne::class);
    }
}
