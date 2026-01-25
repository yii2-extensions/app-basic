<?php

declare(strict_types=1);

namespace app\usecase\hello;

use yii\console\{Application, Controller, ExitCode};

/**
 * Hello console controller.
 *
 * @extends Controller<Application>
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class HelloController extends Controller
{
    /**
     * Prints the provided message (defaults to `hello world`) and returns the exit code.
     */
    public function actionIndex(string $message = 'hello world'): int
    {
        echo $message . "\n";

        return ExitCode::OK;
    }
}
