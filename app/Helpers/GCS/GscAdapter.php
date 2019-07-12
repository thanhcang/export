<?php


namespace App\Helpers\GCS;


use Superbalist\Flysystem\GoogleStorage\GoogleStorageAdapter;

class GscAdapter extends GoogleStorageAdapter
{
    public function getUrl($path)
    {
        $options = [];
        //return CloudStorageTools::getImageServingUrl($path, $options);
        return $path;
    }
}
