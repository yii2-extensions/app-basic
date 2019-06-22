<?php

namespace Terabytesoft\App\Basic;

use Terabytesoft\App\Basic\AcceptanceTester;

/**
 * Class AboutCest.
 *
 * Acceptance tests for codeception
 */
class AboutCest
{
    /**
     * _before
     *
     * @param AcceptanceTester $I
     */
    public function _before(AcceptanceTester $I): void
    {
        $I->amOnPage('/site/about');
        $I->wait(5); // secs
    }

    /**
     * testAboutPageTest
     *
     * @param AcceptanceTester $I
     */
    public function testAboutPageTest(AcceptanceTester $I): void
    {
        $I->wantTo('ensure that about page works.');
        $I->expectTo('see page about.');
        $I->see(\Yii::t('AppBasic', 'About'), 'h1');
    }
}
