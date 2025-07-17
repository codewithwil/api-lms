<?php

namespace App\Models\People\Owner;

use Illuminate\{
    Database\Eloquent\Model
};

class Owner extends Model
{
    protected $table           = 'owners';
    protected $primaryKey      = 'ownerId';
    public $incrementing       = false;
    protected $keyType         = 'string';
    protected string $idPredix = 'OWN';
    protected $fillable        = [
        'ownerId', 'name', 'phone', 'address',
    ];
}
