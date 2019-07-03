<?php


namespace App\Http\Controllers\Api\V1\Managements\Roles\Write\System;


use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\V1\Managements\Roles\Write\System\Forms\FormCreateRole;
use App\Repositories\Contracts\RoleContract;
use Illuminate\Http\Request;

class CreateRole extends ApiController
{
    protected $checkPermission = true;

    protected $gateAbility = 'Roles.Created.Role';

    public function __invoke(FormCreateRole $formCreateRole, Request $request, RoleContract $roleContract)
    {
        // TODO: Implement __invoke() method
        $formCreateRole->apiValidate($request);
        $roleContract->findOrFailByName($formCreateRole->name);
        $roleContract->add($formCreateRole->inputs());
        return $this->render();
    }
}
