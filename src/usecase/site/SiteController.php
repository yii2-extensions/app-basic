<?php

declare(strict_types=1);

namespace app\usecase\site;

use app\usecase\Controller;
use yii\web\ErrorAction;

/**
 * Site web controller.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class SiteController extends Controller
{
    /**
     * Renders the home page.
     */
    public function actionIndex(): string
    {
        return $this->render('index');
    }

    public function actions(): array
    {
        return [
            '404' => ['class' => ErrorAction::class],
        ] + parent::actions();
    }

    public function getViewPath(): string
    {
        return __DIR__ . '/view';
    }
}
