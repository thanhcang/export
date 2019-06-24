<?php


namespace App\Helpers\ListOptions;


use App\Models\Managements\ListsOptions\CalendarStatus;
use App\Models\Managements\ListsOptions\LeadsStatus;
use App\Models\Managements\ListsOptions\PriorityStatus;
use App\Models\Managements\ListsOptions\RatingStatus;
use Exception;
use Illuminate\Support\Arr;

class ListsOptionBridge
{
    private static $models = [
        CalendarStatus::MODEL_NAME => CalendarStatus::class,
        LeadsStatus::MODEL_NAME    => LeadsStatus::class,
        PriorityStatus::MODEL_NAME => PriorityStatus::class,
        RatingStatus::MODEL_NAME   => RatingStatus::class
    ];

    /**
     * @param string $name
     * @return ListsOptions
     * @throws Exception
     */
    public static function instance(string $name)
    {
        if (Arr::has(self::$models, $name)) {
            $model = Arr::get(self::$models, $name);
            return new ListsOptions($model);
        }

        throw new Exception('instance does not defined');
    }

}
