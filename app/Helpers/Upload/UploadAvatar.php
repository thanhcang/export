<?php


namespace App\Helpers\Upload;


class UploadAvatar implements RequestUpload
{
    const AVATAR = 'avatar';

    const SUB_BUCKET = 'avatars';

    public $servingImg = true;

    public function upload(bool $immediately = true)
    {
        // TODO: Implement upload() method.
        if ($immediately = true) {
            request()->file(self::AVATAR)->store(self::SUB_BUCKET . request()->user()->id);
        }
    }

    protected function background()
    {

    }

    protected function immediately()
    {
        $path = request()->file(self::AVATAR)->store(self::SUB_BUCKET . request()->user()->id);

        if ($this->servingImg) {

        }
    }
}
