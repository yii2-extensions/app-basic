<?php

declare(strict_types=1);

namespace app\tests\unit;


use app\usecase\security\Identity;
use Codeception\Test\Unit;
use Yii;
use yii\web\View;

/**
 * Test suite for menu component rendering for authentication scenarios.
 *
 * Verifies correct rendering of the logout link in the navigation menu when a user is authenticated.
 *
 * This test ensures that the menu component displays the logout link only for logged-in users, validating the
 * integration between the identity system and the view rendering logic.
 *
 * Test coverage.
 * - Identity resolution and login simulation for test context.
 * - Rendering of the logout link for authenticated users.
 * - View rendering with expected HTML output.
 *
 * @copyright Copyright (C) 2023 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class MenuTest extends Unit
{
    public function testRenderLogoutLinkWhenUserIsLoggedIn(): void
    {
        $identity = Identity::findIdentity('100');
        $view = new View();

        self::assertNotNull($identity, 'Failed asserting that the user identity with ID \'100\' exists.');

        Yii::$app->user->login($identity);

        self::assertStringContainsString(
            '<a class="nav-link" href="/security/logout" data-method="post">Logout</a>',
            $view->render('@resource/layout/component/menu.php'),
            'Failed asserting that the logout link is rendered for a logged-in user.',
        );
    }
}
