<?php

namespace App\Models\Auth;


use App\Models\BaseModel;
use Carbon\Carbon;
use Illuminate\Support\Str;

class UserPasswordReset extends BaseModel
{

    protected $table = 'password_resets';

    protected $primaryKey = 'email';

    public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'token'
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

    public function setTokenAttribute()
    {
        $this->attributes['token'] = Str::random(60);
    }
}
