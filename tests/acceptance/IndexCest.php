<?php

namespace Terabytesoft\App\Basic;

use Terabytesoft\App\Basic\AcceptanceTester;

class IndexCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/site/index');
        $I->wait(5); // secs
    }

    public function indexPageTest(AcceptanceTester $I)
    {
        $I->wantTo('ensure that index page works.');
        $I->expectTo('see page index.');
        $I->see(\Yii::t('basic', 'Congratulations'), 'h1');
    }
}
