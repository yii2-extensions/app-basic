<?php

declare(strict_types=1);

namespace app\tests\Acceptance;

use app\tests\Support\AcceptanceTester;

final class AboutCest
{
    public function aboutPage(AcceptanceTester $I): void
    {
        $I->amGoingTo('navigate to the About page.');
        $I->amOnPage('site/about');

        $I->wantTo('ensure that About page works.');

        $I->expectTo('see page index.');
        $I->see('About');
        $I->see('This is the About page.');
    }
}
