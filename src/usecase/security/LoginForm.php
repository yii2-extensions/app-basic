<?php

namespace app\usecase\security;

use Yii;
use yii\base\Model;
use yii\web\IdentityInterface;
use yii\web\User;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read Identity|null $user
 *
 */
class LoginForm extends Model
{
    public string $username = '';

    public string $password = '';

    public bool $rememberMe = true;

    private bool|null|IdentityInterface $_identity = false;


    /**
     * @phpstan-return array<array<int|string, mixed>>
     */
    public function rules(): array
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     *
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     *
     * @param array $params the additional name-value pairs given in the rule
     *
     * @phpstan-param array<array-key, mixed> $params
     */
    public function validatePassword($attribute, $params): void
    {
        if ($this->hasErrors() === false) {
            $identity = $this->getIdentity();

            if ($identity instanceof Identity && $identity->validatePassword($this->password) === false) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Finds user by [[username]]
     */
    public function getIdentity(): bool|null|IdentityInterface
    {
        if ($this->_identity === false) {
            $this->_identity = Identity::findByUsername($this->username);
        }

        return $this->_identity;
    }
}
