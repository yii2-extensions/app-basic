<?php

declare(strict_types=1);

namespace app\tests\acceptance;

use app\tests\support\AcceptanceTester;

final class AboutCest
{
    public function aboutPage(AcceptanceTester $I): void
    {
        $I->amGoingTo('navigate to the About page.');
        $I->amOnRoute('site/about');

        $I->wantTo('ensure that About page works.');

        $I->expectTo('see page index.');
        $I->see('About');
        $I->see('This is the About page.');
    }
}
