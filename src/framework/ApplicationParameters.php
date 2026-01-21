<?php

declare(strict_types=1);

namespace app\framework;

use Yii;

/**
 * Provides application-level UI parameters.
 *
 * @phpstan-type MenuItem array<
 *   array{
 *     label?: string,
 *     url?: list<string>,
 *     order?: int, category?: string,
 *     linkAttributes?: array<string, string>
 *   }
 * >
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class ApplicationParameters
{
    /**
     * Returns the navigation menu items for guest users.
     *
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
