<?php


namespace App\Providers;


use App\Helpers\GCS\GscAdapter;
use Google\Cloud\Storage\StorageClient;
use Illuminate\Filesystem\FilesystemManager;
use Illuminate\Support\Arr;
use Superbalist\LaravelGoogleCloudStorage\GoogleCloudStorageServiceProvider;

class GscServiceProvider extends GoogleCloudStorageServiceProvider
{
    private function createClient($config)
    {
        $keyFile = Arr::get($config, 'key_file');
        if (is_string($keyFile)) {
            return new StorageClient([
                'projectId'   => $config['project_id'],
                'keyFilePath' => $keyFile,
            ]);
        }

        if (!is_array($keyFile)) {
            $keyFile = [];
        }
        return new StorageClient([
            'projectId' => $config['project_id'],
            'keyFile'   => array_merge(["project_id" => $config['project_id']], $keyFile)
        ]);
    }

    public function boot()
    {
        $factory = $this->app->make('filesystem');
        /* @var FilesystemManager $factory */
        $factory->extend('gcs', function ($app, $config) {
            $storageClient = $this->createClient($config);

            $bucket        = $storageClient->bucket($config['bucket'], true);
            $pathPrefix    = Arr::get($config, 'path_prefix');
            $storageApiUri = Arr::get($config, 'storage_api_uri');

            $adapter = new GscAdapter($storageClient, $bucket, $pathPrefix, $storageApiUri);

            return $this->createFilesystem($adapter, $config);
        });
    }
}
