<?php

namespace terabytesoft\app\basic\tests;

use terabytesoft\app\basic\tests\AcceptanceTester;

/**
 * Class ErrorCest
 *
 * Acceptance tests for codeception
 */
class ErrorCest
{
    /**
     * _before
     */
    public function _before(AcceptanceTester $I): void
    {
        $I->wantTo('error page works.');
        $I->amOnPage('/site/index1');
        $I->wait(5); // secs
    }

    /**
     * testErrorPage
     */
    public function testErrorPage(AcceptanceTester $I): void
    {
        $I->expectTo('see page error.');
        $I->see(\Yii::t('app.basic', 'Page not found.'));
    }
}
