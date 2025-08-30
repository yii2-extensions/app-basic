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
    public static function getMailerSender(): string
    {
        return 'noreply@example.com';
    }

    public static function getMailerSenderName(): string
    {
        return 'Web application basic';
    }

    /**
     * @phpstan-return MenuItem
     */
    public static function getMenuIsGuest(): array
    {
        return [
            [
                'label' => Yii::t('app.basic', 'Home'),
                'url' => [
                    '/site/index',
                ],
                'order' => 0,
            ],
        ];
    }
}
