<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'mskt_employee';

    protected $fillable = [
        'first_name',
        'last_name',
        'father_name', 
    ];

    protected $primaryKey = 'employee_id';

    public function employerPost(){
        return $this->belongsTo(EmployerPost::class, 'employee_id', 'employee_id');
    }

    public static function getActiveMethods(){
        return self::orderBy('first_name','ASC');
    }
}
