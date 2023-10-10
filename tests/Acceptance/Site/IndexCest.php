<?php

declare(strict_types=1);

namespace App\Tests\Acceptance\Site;

use App\Tests\Support\AcceptanceTester;

final class IndexCest
{
    public function homePageTest(AcceptanceTester $I): void
    {
        $I->amGoingTo('navigate to the Home page.');
        $I->amOnRoute('/');

        $I->wantTo('ensure that Home page works.');
        $I->expectTo('see page index.');
        $I->see('Web Application');
        $I->see('Yii v.2.2');
    }
}
