<?php

namespace Terabytesoft\App\Basic;

use Terabytesoft\App\Basic\AcceptanceTester;

/**
 * Class IndexCest.
 *
 * Acceptance tests for codeception
 */
class IndexCest
{
    /**
     * _before
     *
     * @param AcceptanceTester $I
     */
    public function _before(AcceptanceTester $I): void
    {
        $I->amOnPage('/site/index');
        $I->wait(5); // secs
    }

    /**
     * indexPageTest
     *
     * @param AcceptanceTester $I
     */
    public function testIndexPageTest(AcceptanceTester $I): void
    {
        $I->wantTo('ensure that index page works.');
        $I->expectTo('see page index.');
        $I->see(\Yii::t('basic', 'Congratulations'), 'h1');
    }
}
