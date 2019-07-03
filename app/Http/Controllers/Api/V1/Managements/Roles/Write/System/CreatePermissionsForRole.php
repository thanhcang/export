<?php


namespace App\Http\Controllers\Api\V1\Managements\Roles\Write\System;


use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\V1\Managements\Roles\Write\System\Forms\FormCreatePermissionForRole;
use App\Repositories\Contracts\RoleContract;
use Illuminate\Http\Request;

class CreatePermissionsForRole extends ApiController
{
    protected $checkPermission = true;

    protected $gateAbility = 'Roles.Create.Permissions';

    public function __invoke(
        int $id,
        Request $request,
        FormCreatePermissionForRole $form,
        RoleContract $roleContract
    ) {
        // TODO: Implement __invoke() method.
        $form->apiValidate($request);
        $roleContract->update($id, $form->inputs());
        return $this->render();
    }
}
