<?php

declare(strict_types=1);

namespace app\usecase;

use yii\filters\VerbFilter;
use yii\web\ErrorAction;

/**
 * Base web controller for application use cases.
 *
 * @extends \yii\web\Controller<\yii\web\Application>
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
class Controller extends \yii\web\Controller
{
    /**
     * Layout view path alias.
     *
     * @var false|string|null
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
}
