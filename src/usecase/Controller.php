<?php

declare(strict_types=1);

namespace app\usecase;

use yii\filters\VerbFilter;
use yii\web\ErrorAction;

class Controller extends \yii\web\Controller
{
    /**
     * @var string the default layout for the controller view.
     */
    public $layout = '@resource/layout/main';

    /**
     * @phpstan-return array<array-key, array<array-key, mixed>>
     */
    public function actions(): array
    {
        return [
            'error' => [
                'class' => ErrorAction::class,
            ],
        ];
    }

    /**
     * @phpstan-return array<array-key, array<array-key, mixed>>
     */
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
