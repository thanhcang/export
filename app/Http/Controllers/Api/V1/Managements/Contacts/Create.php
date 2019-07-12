<?php


namespace App\Http\Controllers\Api\V1\Managements\Contacts;


use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\V1\Managements\Contacts\Form\FormCreate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Create extends ApiController
{
    public function __invoke(
        Request $request,
        FormCreate $form
    ) {
        // TODO: Implement __invoke() method.
        //$form->apiValidate($request);
        $path = $request->file('avatar')->store(
            'avatars/' . $request->user()->id,['predefinedAcl' => 'publicRead']
        );
        $url  = Storage::url($path);

        $this->push('url', $url);
        return $this->render();

    }
}
