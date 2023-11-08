<?php

declare(strict_types=1);

namespace App\Tests\Acceptance;

use App\Tests\Support\AcceptanceTester;

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
