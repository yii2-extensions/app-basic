<?php

declare(strict_types=1);

namespace App\UseCase\Hello;

use yii\console\Controller;
use yii\console\ExitCode;

final class HelloController extends Controller
{
    public function actionIndex(string $message = 'hello world'): int
    {
        echo $message . "\n";

        return ExitCode::OK;
    }
}
