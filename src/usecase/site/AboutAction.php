<?php

declare(strict_types=1);

namespace app\usecase\site;

use yii\base\Action;

/**
 * @extends Action<SiteController>
 */
final class AboutAction extends Action
{
    public function run(): string
    {
        return $this->controller->render('about');
    }
}
