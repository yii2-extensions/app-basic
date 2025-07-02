<?php

declare(strict_types=1);

namespace app\usecase\security;

use yii\base\BaseObject;
use yii\web\IdentityInterface;

final class Identity extends BaseObject implements IdentityInterface
{
    public string $accessToken = '';

    public string $authKey = '';

    public string $id = '';

    public string $password = '';

    public string $username = '';

    /**
     * @phpstan-var array<
     *   array-key,
     *   array{id: string, username: string, password: string, authKey: string, accessToken: string},
     * >
     */
    private static array $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ],
        '101' => [
            'id' => '101',
            'username' => 'demo',
            'password' => 'demo',
            'authKey' => 'test101key',
            'accessToken' => '101-token',
        ],
    ];

    public static function findByUsername(string $username): IdentityInterface|null
    {
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    public static function findIdentity($id): IdentityInterface|null
    {
        return isset(self::$users[$id]) ? new self(self::$users[$id]) : null;
    }

    public static function findIdentityByAccessToken($token, $type = null): IdentityInterface|null
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    public function getAuthKey(): string
    {
        return $this->authKey;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function validateAuthKey($authKey): bool
    {
        return $this->authKey === $authKey;
    }

    public function validatePassword(string $password): bool
    {
        return $this->password === $password;
    }
}
