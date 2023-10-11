<?php

declare(strict_types=1);

namespace App\UseCase;

use yii\filters\VerbFilter;
use yii\web\ErrorAction;
use yii\web\Request;

class Controller extends \yii\web\Controller
{
    /**
     * @var string the default layout for the controller view.
     */
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

    protected function getRequest(): Request
    {
        return $this->module->get('request');
    }
}
