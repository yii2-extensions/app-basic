<?php

declare(strict_types=1);

namespace app\framework;

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
                'label' => 'Home',
                'url' => [
                    '/site/index',
                ],
                'order' => 0,
                'category' => 'app.basic',
            ],
            [
                'label' => 'About',
                'url' => [
                    '/site/about',
                ],
                'order' => 1,
                'category' => 'app.basic',
            ],
            [
                'label' => 'Contact',
                'url' => [
                    '/contact/index',
                ],
                'order' => 2,
                'category' => 'app.basic',
            ],
            [
                'label' => 'Login',
                'url' => [
                    '/security/login',
                ],
                'order' => 3,
            ],
        ];
    }

    /**
     * @phpstan-return MenuItem
     */
    public static function getMenuIsLogged(): array
    {
        return [
            [
                'label' => 'Logout',
                'url' => ['/security/logout'],
                'linkOptions' => [
                    'class' => 'nav-link',
                    'data-method' => 'post',
                ],
                'order' => 1,
            ],
        ];
    }
}
