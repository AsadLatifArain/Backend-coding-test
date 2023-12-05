<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $table = 'attendance';
    
    protected $guarded = [];

    public function Employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function Schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
