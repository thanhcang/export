<?php


namespace App\Models;


use App\Traits\Rememberable;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use Rememberable;

    const ENABLE  = 1;
    const DISABLE = 0;
}
