<?php


namespace App\Repositories;


use App\Models\Managements\Lead;
use App\Repositories\Conditions\LeadCondition;
use App\Repositories\Contracts\LeadContract;
use App\Traits\Sort;
use Illuminate\Http\Request;

class LeadRepo extends BaseRepo implements LeadContract
{
    use LeadCondition, Sort;

    public function __construct(Lead $model)
    {
        $this->model = $model;
    }

    public function paginate(Request $request)
    {
        return $this->model->where($this->paginateCondition($request->all()))
                           ->skip($this->paginateOffset())
                           ->take($this->paginateRecord())
                           ->orderBy($this->getColumn(), $this->getDirection())
                           ->get();
    }
}
