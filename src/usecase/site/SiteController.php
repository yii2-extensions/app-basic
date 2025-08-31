<?php

declare(strict_types=1);

namespace app\usecase\site;

use app\usecase\Controller;
use yii\web\ErrorAction;

use function array_merge;

final class SiteController extends Controller
{
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
