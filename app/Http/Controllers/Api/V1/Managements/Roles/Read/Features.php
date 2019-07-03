<?php


namespace App\Http\Controllers\Api\V1\Managements\Roles\Read;


use App\Helpers\Lang\Lang;
use App\Helpers\Roles\FeaturesCollection;
use App\Http\Controllers\Api\ApiController;

class Features extends ApiController
{
    public function __invoke(
        FeaturesCollection $collection
    ) {
        // TODO: Implement __invoke() method.
        $this->push('features', $collection->parser(Lang::getLocate()));
        return $this->render();
    }
}
