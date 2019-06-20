<?php

namespace Terabytesoft\App\Basic;

use Terabytesoft\App\Basic\AcceptanceTester;

class AboutCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/site/about');
    }

    public function aboutPageTest(AcceptanceTester $I)
    {
        $I->wantTo('ensure that about page works.');
        $I->expectTo('see page about.');
        $I->see(\Yii::t('AppBasic', 'About'), 'h1');
    }
}
