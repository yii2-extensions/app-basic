<?php

declare(strict_types=1);

namespace app\framework;

use Yii;

/**
 * @phpstan-type MenuItem array<
 *   array{
 *     label?: string,
 *     url?: list<string>,
 *     order?: int, category?: string,
 *     linkAttributes?: array<string, string>
 *   }
 * >
 */
final class ApplicationParameters
{
    /**
     * @phpstan-return MenuItem
     */
    public static function getMenuIsGuest(): array
    {
        return [
            [
                'label' => Yii::t('app.basic', 'Home'),
                'url' => ['/site/index'],
            ],
        ];
    }
}
