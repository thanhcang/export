<?php


namespace App\Repositories\Conditions;


trait ListsSelectsCondition
{
    protected function forName(string $name)
    {
        return ['select_name' => $name];
    }

    protected function isShow()
    {
        return ['option_show' => true];
    }
}
