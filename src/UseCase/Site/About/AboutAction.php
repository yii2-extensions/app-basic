<?php

declare(strict_types=1);

namespace App\UseCase\Site\About;

use yii\base\Action;

final class AboutAction extends Action
{
    public function run(): string
    {
        return $this->controller->render('about');
    }
}
