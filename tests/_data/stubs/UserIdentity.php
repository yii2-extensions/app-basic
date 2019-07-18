<?php

namespace terabytesoft\app\basic\tests\_data\stubs;

use yii\base\Component;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;

/**
 * Class UserIdentity
 * Stub
 */
class UserIdentity extends Component implements IdentityInterface
{
    private static $ids = [
        'admin'
    ];

    private static $tokens = [
        'token1' => 'admin'

    ];

    private $id;

    private $token;

    public static function findIdentity($id)
    {
        if (in_array($id, static::$ids)) {
            $identitiy = new static();
            $identitiy->id = $id;
            return $identitiy;
        }
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        if (isset(static::$tokens[$token])) {
            $id = static::$tokens[$token];
            $identitiy = new static();
            $identitiy->id = $id;
            $identitiy->token = $token;
            return $identitiy;
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        throw new NotSupportedException();
    }
    public function validateAuthKey($authKey)
    {
        throw new NotSupportedException();
    }
}
