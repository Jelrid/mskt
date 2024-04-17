<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchSchedule extends Model
{
    use HasFactory;

    protected $table = 'mskt_research_schedule';

    protected $fillable = [
        'date',
    ];

    protected $primaryKey = 'research_id';

    public function schedule(){
        return $this->belongsTo(EmployeeSchedule::class,'employee_id');
    }

    public static function getActiveSchedule(){
        return self::orderBy('research_id','ASC')->limit(100);
    }
}
