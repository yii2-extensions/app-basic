<?php

declare(strict_types=1);

namespace App\UseCase\Site;

use App\Framework\Action\LanguageAction;
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
            'language' => [
                'class' => LanguageAction::class,
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
