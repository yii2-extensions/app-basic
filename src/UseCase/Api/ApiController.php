<?php

declare(strict_types=1);

namespace App\UseCase\Api;

use App\UseCase\Api\Theme\ThemeAction;
use yii\filters\VerbFilter;
use yii\web\Controller;

final class ApiController extends Controller
{
    public function actions(): array
    {
        return [
            'theme' => [
                'class' => ThemeAction::class,
            ],
        ];
    }

    public function beforeAction($action): bool
    {
        if (YII_ENV == 'test' && $action->id == 'theme') {
            $this->enableCsrfValidation = false;
        }

        return parent::beforeAction($action);
    }

    public function behaviors(): array
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'theme' => ['POST'],
                ],
            ],
        ];
    }
}
