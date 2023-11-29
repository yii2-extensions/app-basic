<?php

declare(strict_types=1);

namespace App\Tests\Unit;

use App\Tests\Support\UnitTester;
use App\UseCase\Contact\ContactController;
use Yii;
use yii\base\InvalidConfigException;

final class ContactControllerCest
{
    public function testIndex(UnitTester $I): void
    {
        $contactControler = new ContactController('contact', Yii::$app);

        $contactControler->formModelClass = '';

        $I->expectThrowable(
            new InvalidConfigException('The "formModelClass" property must be set.'),
            static fn() => $contactControler->runAction('index'),
        );
    }
}
