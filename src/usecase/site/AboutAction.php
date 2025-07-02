<?php

declare(strict_types=1);

namespace app\usecase\site;

use yii\base\Action;

/**
 * @template T of SiteController
 * @extends Action<T>
 */
final class AboutAction extends Action
{
    public function run(): string
    {
        return $this->controller->render('about');
    }
}
