<?php

declare(strict_types=1);

namespace app\tests\Acceptance;

use app\tests\Support\AcceptanceTester;

final class ContactCest
{
    public function contactPage(AcceptanceTester $I): void
    {
        $I->amGoingTo('navigate to the Contact page.');
        $I->amOnRoute('contact/index');

        $I->wantTo('ensure that Contact page works.');

        $I->expectTo('see page index.');
        $I->see('Contact');
        $I->see('Please fill out the following form to contact us.');
    }
}
