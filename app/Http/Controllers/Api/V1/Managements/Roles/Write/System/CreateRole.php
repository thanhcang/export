<?php


namespace App\Http\Controllers\Api\V1\Managements\Roles\Write\System;


use App\Helpers\Lang\Lang;
use App\Helpers\Roles\FeaturesCollection;
use App\Http\Controllers\Api\ApiController;

class CreateRole extends ApiController
{
    protected $checkPermission = false;

    protected $gateAbility = 'Roles.Created.Role';

    public function __invoke()
    {
        // TODO: Implement __invoke() method
        $this->push('features', FeaturesCollection::parser(Lang::getLocate()));
        return $this->render();
    }
}
