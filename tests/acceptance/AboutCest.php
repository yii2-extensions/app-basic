<?php

namespace terabytesoft\app\basic\tests;

use terabytesoft\app\basic\tests\AcceptanceTester;

/**
 * Class AboutCest
 *
 * Acceptance tests for codeception
 */
class AboutCest
{
    /**
     * _before
     */
    public function _before(AcceptanceTester $I): void
    {
        $I->wantTo('ensure that about page works.');
        $I->amOnPage('/site/about');
        $I->wait(5); // secs
    }

    /**
     * testAboutPage
     */
    public function testAboutPage(AcceptanceTester $I): void
    {
        $I->expectTo('see page about.');
        $I->see(\Yii::t('app.basic', 'About'));
    }
}
