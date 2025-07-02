<?php

declare(strict_types=1);

namespace app\tests\acceptance;

use app\tests\support\AcceptanceTester;

final class SiteCest
{
    public function homePage(AcceptanceTester $I): void
    {
        $I->amGoingTo('navigate to the Home page.');
        $I->amOnRoute('/');

        $I->wantTo('ensure that Home page works.');

        $I->expectTo('see page index.');
        $I->see('Web Application');
        $I->see('Yii v.22');
        $I->see('English');
    }
}
