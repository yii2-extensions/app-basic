<?php

declare(strict_types=1);

namespace App\UseCase;

use Yii;
use yii\base\Model;
use yii\filters\VerbFilter;
use yii\web\ErrorAction;
use yii\web\Request;
use yii\web\Response;
use yii\widgets\ActiveForm;

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

    /**
     * Performs the AJAX validation.
     *
     * @codeCoverageIgnore
     *
     * @todo use selenium to test this.
     */
    protected function performAjaxValidation(Model $model)
    {
        if (
            $this->request instanceof Request &&
            $this->response instanceof Response &&
            $this->request->isAjax &&
            $model->load($this->request->post())
        ) {
            $this->response->format = Response::FORMAT_JSON;
            $this->response->data = ActiveForm::validate($model);
            $this->response->send();

            Yii::$app->end();
        }
    }
}
