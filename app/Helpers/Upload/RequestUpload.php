<?php


namespace App\Helpers\Upload;


interface RequestUpload
{
    public function upload(bool $immediately = true);
}
