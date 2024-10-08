<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been set up for each driver as an example of the required values.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'throw' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
            'throw' => false,
        ],

        's3' => [
//            'driver' => 's3',
            'driver' => 's3',
            'disk'  =>  's3',
            'key' => env('AWS_S3_ACCESS_KEY_ID'),
            'secret' => env('AWS_S3_SECRET_ACCESS_KEY'),
            'region' => env('AWS_S3_DEFAULT_REGION'),
            'name' => env('AWS_S3_USERNAME'),
            'bucket' => env('AWS_S3_BUCKET'),
            'url' => env('AWS_S3_URL'),
            'endpoint' => env('AWS_S3_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_S3_USE_PATH_STYLE_ENDPOINT', false),
            'folder' => env('AWS_FOLDER'),
            'scheme'=>'https',
            'thrown'    =>  true

        ],
        'S3_VT360' => [
//            'driver' => 's3',
            'driver' => 's3',
            'disk'  =>  's3',
            'key' => env('AWS_S3_VT360_ACCESS_KEY_ID'),
            'secret' => env('AWS_S3_VT360_SECRET_ACCESS_KEY'),
            'region' => env('AWS_S3_VT360_DEFAULT_REGION'),
            'name' => env('AWS_S3_VT360_USERNAME'),
            'bucket' => env('AWS_S3_VT360_BUCKET'),
            'url' => env('AWS_S3_VT360_URL'),
            'endpoint' => env('AWS_S3_VT360_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_S3_VT360_USE_PATH_STYLE_ENDPOINT', false),
            'folder' => env('AWS_FOLDER'),
            'scheme'=>'https',
            'thrown'    =>  true

        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
