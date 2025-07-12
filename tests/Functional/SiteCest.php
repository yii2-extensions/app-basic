<?php

declare(strict_types=1);

namespace app\tests\Functional;

use app\tests\Support\FunctionalTester;

final class SiteCest
{
    public function homePage(FunctionalTester $I): void
    {
        $I->amGoingTo('navigate to the Home page.');
        $I->amOnPage('/');

        $I->wantTo('ensure that Home page works.');

        $I->expectTo('see page index.');
        $I->see('Web Application');
        $I->see('English');
    }
}
