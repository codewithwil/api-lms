<?php

namespace App\Models\Management\School;

use App\{
    Traits\GenerateCustomId
};

use Illuminate\{
    Database\Eloquent\Model
};

class School extends Model
{
    use GenerateCustomId;
    protected $table           = 'schools';
    protected $primaryKey      = 'schoolId';
    public $incrementing       = false;
    protected $keyType         = 'string';
    protected string $idPredix = 'SCH';
    protected $fillable        = [
        'schoolId', 'npsn', 'address', 'phone', 'status'
    ];
}
