<?php


namespace App\Helpers\Contacts;


class UploadAvatar
{
    public function upload()
    {
        $file = request()->file('avatar');
    }
}
