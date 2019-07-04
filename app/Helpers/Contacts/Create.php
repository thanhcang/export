<?php


namespace App\Helpers\Contacts;


use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Create
{
    protected function generateNo()
    {
        return Str::random();
    }

    public function create(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $upload = new UploadAvatar();
        }
    }
}
