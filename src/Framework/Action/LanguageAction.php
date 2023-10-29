<?php

declare(strict_types=1);

namespace App\Framework\Action;

use Yii;
use yii\base\Action;
use yii\web\Cookie;
use yii\web\Request;

class LanguageAction extends Action
{
    public function __construct(
        $id,
        $controller,
        private readonly Request $request,
        $config = []
    ) {
        parent::__construct($id, $controller, $config);
    }
    public function run(): void
    {
        if ($this->request->isAjax === false) {
            return;
        }

        $language = $this->request->post('language');
        Yii::$app->language = $language;

        $cookie = new Cookie(
            [
                'name' => 'language',
                'value' => $language,
                'expire' => time() + 86400 * 365, // 1 year
                'httpOnly' => true,
                'sameSite' => 'strict',
            ]
        );

        Yii::$app->getResponse()->getCookies()->add($cookie);
    }
}
