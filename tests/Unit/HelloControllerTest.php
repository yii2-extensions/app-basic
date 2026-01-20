<?php

declare(strict_types=1);

namespace app\tests\Unit;

use app\usecase\hello\HelloController;
use Codeception\Test\Unit;
use Yii;
use yii\base\InvalidRouteException;
use yii\console\Application;
use yii\console\Exception;

use function ob_get_clean;
use function ob_start;

/**
 * Test suite for {@see HelloController} output behavior.
 *
 * Verifies that the HelloController's index action produces the expected output.
 *
 * This test ensures that the controller's action renders the correct string, providing confidence in the controller
 * output logic and integration with the Yii application context.
 *
 * Test coverage.
 * - Controller instantiation and action execution.
 * - Output of the index action ("hello world\n").
 *
 * @copyright Copyright (C) 2023 Terabytesoftw.
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
        $helloControler = new HelloController('hello', $application);

        ob_start();
        $helloControler->runAction('index');
        $result = ob_get_clean();

        self::assertSame("hello world\n", $result, 'Output should be \'hello world\'');
    }
}
