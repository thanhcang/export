<?php


namespace App\Repositories\Conditions;


use App\Models\Managements\ListsSelect\ListsOptions;

trait ListsSelectsCondition
{
    protected function isShow()
    {
        return ['option_show' => ListsOptions::ENABLE];
    }
}
