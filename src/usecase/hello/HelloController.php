<?php

declare(strict_types=1);

namespace app\usecase\hello;

use yii\console\{Controller, ExitCode};

final class HelloController extends Controller
{
    public function actionIndex(string $message = 'hello world'): int
    {
        echo $message . "\n";

        return ExitCode::OK;
    }
}
