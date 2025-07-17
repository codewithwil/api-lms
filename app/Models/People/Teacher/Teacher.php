<?php

namespace App\Models\People\Teacher;

use Illuminate\{
    Database\Eloquent\Model
};

class Teacher extends Model
{
    const RELIGION_ISLAM       = 1;
    const RELIGION_PROTESTAN   = 2;
    const RELIGION_KATOLIK     = 3;
    const RELIGION_HINDU       = 4;
    const RELIGION_BUDHA       = 5;
    const RELIGION_KONGHUCU    = 6;
    const SEX_MALE             = 1;
    const SEX_FEMALE           = 2;
    const TYPE_WALAS           = 1;
    const TYPE_BIASA           = 2;
    const TEACHERSTAT_PNS      = 1;
    const TEACHERSTAT_PPPK     = 2;
    const STATUS_ACTIVE        = 1;
    const STATUS_RESIGN        = 2;
    const STATUS_PECAT         = 3;
    const STATUS_MENINGGAL     = 4; 
    protected $table           = 'teachers';
    protected $primaryKey      = 'teacherId';
    public $incrementing       = false;
    protected $keyType         = 'string';
    protected string $idPredix = 'TCH';
    protected $fillable        = [
        'teacherId', 'name', 'nip', 'type', 'phone',
        'address', 'dateBirth', 'addressBirth', 'religion',
        'sex', 'dateEmp', 'teacherStatus', 'status'
    ];
}
