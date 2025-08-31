<?php

declare(strict_types=1);

use HttpSoft\Message\{
    ResponseFactory,
    ServerRequestFactory,
    StreamFactory,
    UploadedFileFactory,
};
use Psr\Http\Message\{
    ResponseFactoryInterface,
    ServerRequestFactoryInterface,
    StreamFactoryInterface,
    UploadedFileFactoryInterface,
};
use Spiral\RoadRunner\Http\{PSR7Worker, PSR7WorkerInterface};
use Spiral\RoadRunner\Worker;
use yii\di\Instance;

return [
    'definitions' => [
        PSR7WorkerInterface::class => [
            'class' => PSR7Worker::class,
            '__construct()' => [
                Worker::create(),
                Instance::of(ServerRequestFactoryInterface::class),
                Instance::of(StreamFactoryInterface::class),
                Instance::of(UploadedFileFactoryInterface::class),
            ],
        ],
        ResponseFactoryInterface::class => ResponseFactory::class,
        ServerRequestFactoryInterface::class => ServerRequestFactory::class,
        StreamFactoryInterface::class => StreamFactory::class,
        UploadedFileFactoryInterface::class => UploadedFileFactory::class,
    ],
];
