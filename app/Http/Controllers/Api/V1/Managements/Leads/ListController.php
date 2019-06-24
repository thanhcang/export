<?php


namespace App\Http\Controllers\Api\V1\Managements\Leads;


use App\Http\Controllers\Api\ApiController;
use App\Repositories\Contracts\LeadContract;
use App\Traits\RequestPaginate;
use App\Traits\Sort;
use Illuminate\Http\Request;

class ListController extends ApiController
{
    use RequestPaginate, Sort;

    public function handle(Request $request, LeadContract $leadContract)
    {
        $this->paginateHandle();
        $this->push('leads', $leadContract->paginate($request));
        return $this->render();
    }
}
