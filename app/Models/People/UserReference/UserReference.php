<?php

namespace App\Models\People\UserReference;

use App\{
    Models\User
};

use Illuminate\{
    Database\Eloquent\Model,
    Database\Eloquent\Relations\MorphTo
};

class UserReference extends Model
{
    protected $table           = 'user_references';
    protected $primaryKey      = 'usReffId';
    public $incrementing       = false;
    protected $keyType         = 'string';
    protected string $idPredix = 'URR';
    protected $fillable        = ['userUUID','user_id', 'ref_type', 'ref_id'];

    public function user(){return $this->belongsTo(User::class);}
    public function ref(): MorphTo{return $this->morphTo(__FUNCTION__, 'ref_type', 'ref_id');}
}
