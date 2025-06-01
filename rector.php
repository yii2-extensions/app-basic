<?php

declare(strict_types=1);

return static function (Rector\Config\RectorConfig $rectorConfig): void {
    $rectorConfig->parallel();

    $rectorConfig->importNames();

    $rectorConfig->paths(
        [
            __DIR__ . '/src',
            __DIR__ . '/tests',
        ],
    );

    $rectorConfig->sets(
        [
            Rector\Set\ValueObject\SetList::PHP_82,
            Rector\Set\ValueObject\LevelSetList::UP_TO_PHP_82,
            Rector\Set\ValueObject\SetList::TYPE_DECLARATION,
        ],
    );

    $rectorConfig->rule(
        Rector\CodeQuality\Rector\BooleanAnd\SimplifyEmptyArrayCheckRector::class
    );
};
