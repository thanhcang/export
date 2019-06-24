<?php


namespace App\Helpers\ListOptions;


use App\Models\Managements\ListsOptions\ListsOptions;

trait ListsOptionCondition
{
    protected function isShow()
    {
        return ['option_show' => ListsOptions::ENABLE];
    }
}
