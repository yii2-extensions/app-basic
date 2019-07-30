<?php

namespace terabytesoft\app\basic\tests;

use terabytesoft\app\basic\tests\AcceptanceTester;

/**
 * Class IndexCest
 *
 * Acceptance tests for codeception
 */
class IndexCest
{
    /**
     * _before
     */
    public function _before(AcceptanceTester $I): void
    {
        $I->wantTo('index page works.');
        $I->amOnPage('/site/index');
        $I->wait(5); // secs
    }

    /**
     * testIndexPage
     */
    public function testIndexPage(AcceptanceTester $I): void
    {
        $I->expectTo('see page index.');
        $I->see(\Yii::t('app.basic', 'Web Application'));
    }
}
