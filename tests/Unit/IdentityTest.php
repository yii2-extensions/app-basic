<?php

declare(strict_types=1);

namespace app\tests\Unit;

use app\usecase\security\Identity;
use Codeception\Test\Unit;

/**
 * Test suite for {@see Identity} authentication and identity resolution.
 *
 * Verifies the correct behavior of the identity component for user lookup, authentication, and credential validation.
 *
 * These tests ensure that identity resolution by access token and username works as expected, and that authentication
 * methods such as password and auth key validation are reliable and robust.
 *
 * The suite covers scenarios for valid and invalid tokens, usernames, and credentials, providing confidence in the
 * security and correctness of the identity system.
 *
 * Test coverage.
 * - Auth key validation for correct and incorrect keys.
 * - Identity lookup by access token (valid and invalid cases).
 * - Identity lookup by username (existing and non-existent users).
 * - Password validation for correct and incorrect passwords.
 *
 * @copyright Copyright (C) 2023 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class IdentityTest extends Unit
{
    public function testFindByAccessTokenReturnsIdentityForValidToken(): void
    {
        $user = Identity::findIdentityByAccessToken('100-token');

        self::assertInstanceOf(Identity::class, $user, "Expected an instance of 'Identity' for username 'admin'.");
        self::assertSame('100', $user->getId(), "User ID for access token '100-token' should be '100'.");
        self::assertSame('admin', $user->username, "Username property should be 'admin'.");
    }

    public function testFindByAccessTokenReturnsNullForInvalidToken(): void
    {
        self::assertNull(
            Identity::findIdentityByAccessToken('invalid-token'),
            "Expected 'null' when finding a user by an invalid access token.",
        );
    }

    public function testFindByUsernameReturnsIdentity(): void
    {
        $user = Identity::findByUsername('admin');

        self::assertInstanceOf(Identity::class, $user, "Expected an instance of 'Identity' for username 'admin'.");
        self::assertSame('100', $user->getId(), "User ID for 'admin' should be '100'.");
        self::assertSame('admin', $user->username, "Username property should be 'admin'.");
    }

    public function testFindByUsernameReturnsNullForNonexistentUser(): void
    {
        self::assertNull(
            Identity::findByUsername('nonexistent'),
            "Expected 'null' when finding a user by a 'nonexistent' username.",
        );
    }

    public function testValidateAuthKeyReturnsTrueForCorrectAuthKey(): void
    {
        $user = Identity::findByUsername('admin');

        self::assertInstanceOf(
            Identity::class,
            $user,
            "Expected an instance of 'Identity' for username 'admin'.",
        );
        self::assertTrue(
            $user->validateAuthKey('test100key'),
            'Expected auth key validation to return `true` for correct auth key.',
        );
    }

    public function testValidatePasswordReturnsTrueForCorrectPassword(): void
    {
        $user = Identity::findByUsername('admin');

        self::assertInstanceOf(
            Identity::class,
            $user,
            "Expected an instance of 'Identity' for username 'admin'.",
        );
        self::assertTrue(
            $user->validatePassword('admin'),
            'Expected password validation to return `true` for correct password.',
        );
    }
}
