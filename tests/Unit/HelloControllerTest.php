<?php

declare(strict_types=1);

namespace app\tests\Unit;

use app\usecase\hello\HelloController;
use Codeception\Test\Unit;
use yii\base\InvalidRouteException;
use yii\console\Application;
use yii\console\Exception;

use function ob_get_clean;
use function ob_start;

/**
 * Unit tests for {@see HelloController} output behavior.
 *
 * Asserts that running the `index` action prints `hello world\n` to stdout.
 *
 * Test coverage.
 * - Controller instantiation and `index` action execution.
 * - Output is `hello world\n`.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class HelloControllerTest extends Unit
{
    /**
     * @throws Exception if an unexpected error occurs during execution.
     * @throws InvalidRouteException if the action route is invalid.
     */
    public function testIndexActionOutputsHelloWorld(): void
    {
        $application = new Application(['id' => 'test', 'basePath' => dirname(__DIR__, 2)]);
        $helloController = new HelloController('hello', $application);

        ob_start();
        $helloController->runAction('index');
        $result = ob_get_clean();

        self::assertSame("hello world\n", $result, 'Output should be \'hello world\'');
    }
}
