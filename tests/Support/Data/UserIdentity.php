<?php

declare(strict_types=1);

namespace App\Tests\Support\Data;

use yii\base\Component;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;

final class UserIdentity extends Component implements IdentityInterface
{
    private string $id = '';

    public function getId(): string
    {
        return $this->id;
    }

    public function getAuthKey(): string
    {
        return 'ABCD1234';
    }

    public function validateAuthKey($authKey): bool
    {
        return $authKey === 'ABCD1234';
    }

    public static function findIdentity($id): IdentityInterface|null
    {
        if (in_array($id, ['user1', 'user2', 'user3'])) {
            $identitiy = new self();
            $identitiy->id = $id;

            return $identitiy;
        }

        return null;
    }

    public static function findIdentityByAccessToken($token, $type = null): void
    {
        throw new NotSupportedException();
    }
}
