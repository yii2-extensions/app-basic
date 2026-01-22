<?php

declare(strict_types=1);

namespace app\tests\Acceptance;

use app\tests\Support\AcceptanceTester;

/**
 * Acceptance tests for the site home page.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class SiteCest
{
    public function homePage(AcceptanceTester $I): void
    {
        $I->amGoingTo('navigate to the Home page.');
        $I->amOnPage('/');

        $I->wantTo('ensure that Home page works.');

        $I->expectTo('see page index.');
        $I->see('Web Application');
    }
}
