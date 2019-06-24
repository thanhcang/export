<?php


namespace App\Http\Controllers\Api\V1\User;


use App\Http\Controllers\Api\ApiController;

class ProfileController extends ApiController
{
    public function profile()
    {
        $this->push('profile', $this->currentUser());
        return $this->render();
    }
}
