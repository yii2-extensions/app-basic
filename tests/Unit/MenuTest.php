<?php

declare(strict_types=1);

namespace App\Tests\Unit;

use App\Tests\Support\Data\UserIdentity;
use Codeception\Test\Unit;
use Yii;
use yii\web\User;
use yii\web\View;

final class MenuTest extends Unit
{
    public mixed $tester;

    public function testMenu(): void
    {
        $view = new View();

        Yii::$app->request->setUrl('http://example.com');
        Yii::$app->params['app.menu.islogged'] = [
            [
                'label' => 'Logout',
                'link' => ['/logout/index'],
                'order' => 1,
            ],
        ];
        Yii::$container->set(User::class, ['identityClass' => UserIdentity::class]);

        $user = Yii::$container->get(User::class);
        $user->login(UserIdentity::findIdentity('user1'), 0);
        $result = $view->render('@resource/layout/component/menu.php');

        $this->assertStringContainsString('<a class="nav-link" href="/logout/index">Logout</a>', $result);
    }
}
