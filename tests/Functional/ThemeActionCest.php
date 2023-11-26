<?php

declare(strict_types=1);

namespace App\Tests\Functional;

use App\Tests\Support\FunctionalTester;
use Yii;

final class ThemeActionCest
{
    public function testTheme(FunctionalTester $I): void
    {
        $theme = ['theme' => 'dark'];

        $I->sendPost('/api/theme', json_encode($theme));
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseContainsJson($theme);
        $I->seeCookie('theme');
    }

    public function testThemeWithCookie(FunctionalTester $I): void
    {
        $theme = ['theme' => 'dark'];

        $I->sendPost('/api/theme', json_encode($theme));
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseContainsJson($theme);
        $I->seeCookie('theme');

        $I->sendPost('/api/theme', json_encode($theme));
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseContainsJson($theme);
        $I->seeCookie('theme');
    }
}
