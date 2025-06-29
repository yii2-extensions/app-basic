<?php

declare(strict_types=1);

namespace app\usecase\site;

use app\usecase\Controller;
use yii\web\ErrorAction;

final class SiteController extends Controller
{
    /**
     * @phpstan-return array<array-key, array<array-key, mixed>>
     */
    public function actions(): array
    {
        return [
            '404' => [
                'class' => ErrorAction::class,
            ],
            'about' => [
                'class' => AboutAction::class,
            ],
        ];
    }

    public function actionIndex(): string
    {
        return $this->render('index');
    }

    public function getViewPath(): string
    {
        return __DIR__ . '/view';
    }
}
