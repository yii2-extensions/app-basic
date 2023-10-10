<?php

declare(strict_types=1);

namespace App\UseCase\About;

use App\UseCase\Controller;

final class AboutController extends Controller
{
    public function actionIndex(): string
    {
        return $this->render('index');
    }

    public function getViewPath(): string
    {
        return __DIR__ . '/view';
    }
}
