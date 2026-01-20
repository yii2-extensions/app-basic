<?php

declare(strict_types=1);

namespace app\usecase;

use yii\filters\VerbFilter;
use yii\web\ErrorAction;

/**
 * @extends \yii\web\Controller<\yii\base\Module>
 */
class Controller extends \yii\web\Controller
{
    public $layout = '@resource/layout/main';

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
}
