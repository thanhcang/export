<?php


namespace App\Repositories;


use App\Models\System\LogDatabase;
use App\Repositories\Contracts\LogDatabaseContract;

class LogDatabaseRepo extends BaseRepo implements LogDatabaseContract
{
    public function __construct(LogDatabase $model)
    {
        $this->model = $model;
    }
}
