<?php

declare(strict_types=1);

namespace App\UseCase\Api\Theme;

use yii\base\Action;
use yii\helpers\Json;
use yii\web\Cookie;
use yii\web\Request;
use yii\web\Response;

final class ThemeAction extends Action
{
    public function run(): array
    {
        if ($this->controller->response instanceof Response && $this->controller->request instanceof Request) {
            $this->controller->response->format = Response::FORMAT_JSON;

            $this->controller->response->format = Response::FORMAT_JSON;

            $theme = Json::decode($this->controller->request->getRawBody());

            if (isset($theme['theme'])) {
                $cookie = $this->controller->request->cookies->get('theme');

                if ($cookie !== null) {
                    $cookie->value = $theme['theme'];
                    $this->controller->response->cookies->add($cookie);
                } else {
                    $cookie = new Cookie(
                        [
                            'name' => 'theme',
                            'value' => $theme['theme'],
                            'expire' => time() + 86400, // 1 day
                        ],
                    );

                    $this->controller->response->cookies->add($cookie);
                }
            }
        }

        return $theme ?? [];
    }
}
