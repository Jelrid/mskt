<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeSchedule extends Model
{
    use HasFactory;

    protected $table = 'mskt_employee_schedule';

    protected $fillable = [
        'time_start',
        'time_end',
    ];
    protected $primaryKey = 'id';

    public function schedules(){
        return $this->hasMany(ResearchSchedule::class);
    }
    public function cabinentSchedule(){
        return $this->belongsTo(CabinetSchedule::class,'cabinet_schedule_id','id');
    }

    public static function getActiveSchedule(){
        return self::orderBy('employee_id','ASC')->limit(100);
    }

}
