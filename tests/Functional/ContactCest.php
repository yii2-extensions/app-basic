<?php

declare(strict_types=1);

namespace app\tests\Functional;

use app\tests\Support\FunctionalTester;

final class ContactCest
{
    public function _before(FunctionalTester $I): void
    {
        $I->amGoingTo('navigate to the Contact page.');
        $I->amOnRoute('contact/index');
    }

    public function contactFormSubmitFormEmailWrongData(FunctionalTester $I): void
    {
        $I->amGoingTo('contact form submit form with email wrong.');
        $I->submitForm('#contact-form', [
            'ContactForm[name]' => 'tester',
            'ContactForm[email]' => 'tester.email',
            'ContactForm[subject]' => 'test subject',
            'ContactForm[body]' => 'test content',
            'ContactForm[verifyCode]' => 'testme',
        ]);

        $I->expectTo('Email is not a valid email address');
        $I->dontSee('Name cannot be blank');
        $I->see('Email is not a valid email address.');
        $I->dontSee('Subject cannot be blank');
        $I->dontSee('Body cannot be blank');
        $I->dontSee('The verification code is incorrect');
    }

    public function contactFormSubmitFormEmptyData(FunctionalTester $I): void
    {
        $I->amGoingTo('contact form submit form with empty data.');
        $I->submitForm('#contact-form', []);

        $I->expectTo('see validations errors.');
        $I->see('Name cannot be blank.');
        $I->see('Email cannot be blank.');
        $I->see('Subject cannot be blank.');
        $I->see('Body cannot be blank.');
    }

    public function contactFormSubmitFormSuccessData(FunctionalTester $I): void
    {
        $I->amGoingTo('contact form submit form with success data.');
        $I->submitForm('#contact-form', [
            'ContactForm[name]' => 'tester',
            'ContactForm[email]' => 'tester@example.com',
            'ContactForm[subject]' => 'test subject',
            'ContactForm[body]' => 'test content',
            'ContactForm[verifyCode]' => 'testme',
        ]);

        $I->expectTo('success.');
        $I->see('Message sent successfully!.');
        $I->see('Thank you for contacting us. We will respond to you as soon as possible.');
    }
}
