<?php

declare(strict_types=1);

namespace App\UseCase\Site;

use App\UseCase\Site\About\AboutAction;
use App\UseCase\Controller;
use yii\web\ErrorAction;

final class SiteController extends Controller
{
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
