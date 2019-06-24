<?php

namespace App\Models\Auth;


use App\Models\BaseModel;
use Carbon\Carbon;
use Illuminate\Support\Str;

class UserEmailVerify extends BaseModel
{

    protected $primaryKey = 'user_id';

    public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    public function setTokenAttribute($value)
    {
        $this->attributes['token'] = Str::random(60);
    }
}
