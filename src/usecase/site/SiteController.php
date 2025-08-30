<?php

declare(strict_types=1);

namespace app\usecase\site;

use app\usecase\Controller;
use yii\helpers\ArrayHelper;
use yii\web\ErrorAction;

final class SiteController extends Controller
{
    public function actionIndex(): string
    {
        return $this->render('index');
    }

    public function actions(): array
    {
        return ArrayHelper::merge(
            [
                '404' => ['class' => ErrorAction::class],
            ],
            parent::actions(),
        );
    }

    public function getViewPath(): string
    {
        return __DIR__ . '/view';
    }
}
