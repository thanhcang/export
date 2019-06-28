<?php


namespace App\Helpers\ListsSelects;


use App\Helpers\Trans\TransService;
use App\Models\Managements\ListsSelect\CalendarSelects;
use App\Models\Managements\ListsSelect\LeadsSelects;
use App\Models\Managements\ListsSelect\PrioritySelects;
use App\Models\Managements\ListsSelect\RatingSelects;
use App\Repositories\ListsSelectsRepo;
use Exception;
use Illuminate\Support\Arr;

class ListsSelectService
{
    /**
     * @var TransService
     */
    private $transService;

    public function __construct(TransService $transService)
    {
        $this->transService = $transService;
    }

    private $models = [
        CalendarSelects::MODEL_NAME => CalendarSelects::class,
        LeadsSelects::MODEL_NAME    => LeadsSelects::class,
        PrioritySelects::MODEL_NAME => PrioritySelects::class,
        RatingSelects::MODEL_NAME   => RatingSelects::class
    ];

    /**
     * @param string $name
     * @return
     * @throws Exception
     */
    public function model(string $name)
    {
        if (Arr::has($this->models, $name)) {
            $model = Arr::get($this->models, $name);
            return new ListsSelectsRepo(new $model);
        }

        throw new Exception('instance does not defined');
    }

}
