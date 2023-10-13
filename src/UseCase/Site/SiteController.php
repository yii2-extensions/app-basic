<?php

declare(strict_types=1);

namespace App\UseCase\Site;

use App\UseCase\Controller;
use yii\filters\VerbFilter;
use yii\web\ErrorAction;

final class SiteController extends Controller
{
    public function actions(): array
    {
        return [
            'error' => [
                'class' => ErrorAction::class,
            ],
        ];
    }

    public function behaviors(): array
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
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