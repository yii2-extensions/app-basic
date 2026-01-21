<?php

declare(strict_types=1);

namespace app\tests\Functional;

use app\tests\Support\FunctionalTester;

/**
 * Functional tests for the site home page.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class SiteCest
{
    public function homePage(FunctionalTester $I): void
    {
        $I->amGoingTo('navigate to the Home page.');
        $I->amOnPage('/');

        $I->wantTo('ensure that Home page works.');

        $I->seeResponseCodeIs(200);
        $I->expectTo('see page index.');
        $I->seeInTitle('Home');
        $I->seeElement('body');
        $I->see('Web Application', 'h1');
    }
}
