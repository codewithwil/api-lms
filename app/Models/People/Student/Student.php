<?php

namespace App\Models\People\Student;

use Illuminate\{
    Database\Eloquent\Model
};

class Student extends Model
{
    const RELIGION_ISLAM       = 1;
    const RELIGION_PROTESTAN   = 2;
    const RELIGION_KATOLIK     = 3;
    const RELIGION_HINDU       = 4;
    const RELIGION_BUDHA       = 5;
    const RELIGION_KONGHUCU    = 6;
    const SEX_MALE             = 1;
    const SEX_FEMALE           = 2;
    const STATUS_ACTIVE        = 1;
    const STATUS_ALUMNUS       = 2;
    const STATUS_TSCHOOL       = 3;
    const STATUS_DO            = 4;
    protected $table           = 'students';
    protected $primaryKey      = 'studentId';
    public $incrementing       = false;
    protected $keyType         = 'string';
    protected string $idPredix = 'STD';
    protected $fillable        = [
        'studentId', 'name', 'phone', 'address',
        'dateBirth', 'addressBirth', 'religion', 'sex',
        'guardian_name', 'entry_year', 'status'
    ];
}
