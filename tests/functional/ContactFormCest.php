<?php

namespace terabytesoft\app\basic\tests;

use terabytesoft\app\basic\tests\FunctionalTester;

/**
 * Class ContactFormCest
 *
 * Functional tests for codeception
 */
class ContactFormCest
{
    /**
     * _before
     */
    public function _before(FunctionalTester $I)
    {
        $I->wantTo('ensure that contact page works.');
        $I->amOnPage('/site/contact');
    }

    /**
     * testContactFormPageTest
     *
     * @param FunctionalTester $I
     */
    public function testContactFormPageTest(FunctionalTester $I): void
    {
        $I->expectTo('see page contact.');
        $I->see(\Yii::t('app.basic', 'Contact'), 'h1');
    }

    /**
     * testContactFormSubmitFormEmptyDataTest
     */
    public function testContactFormSubmitFormEmptyDataTest(FunctionalTester $I): void
    {
        $I->amGoingTo('contact form submit form with empty data.');
        $I->submitForm('#contact-form', []);

        $I->expectTo('see validations errors.');
        $I->see(\Yii::t('app.basic', 'Name cannot be blank.'), '.invalid-feedback');
        $I->see(\Yii::t('app.basic', 'Email cannot be blank.'), '.invalid-feedback');
        $I->see(\Yii::t('app.basic', 'Subject cannot be blank.'), '.invalid-feedback');
        $I->see(\Yii::t('app.basic', 'Body cannot be blank.'), '.invalid-feedback');
    }

    /**
     * testContactFormSubmitFormEmailWrongDataTest
     */
    public function testContactFormSubmitFormEmailWrongDataTest(FunctionalTester $I): void
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
        $I->dontSee('Name cannot be blank', '.invalid-feedback');
        $I->see(\Yii::t('app.basic', 'Email is not a valid email address.'), '.invalid-feedback');
        $I->dontSee(\Yii::t('app.basic', 'Subject cannot be blank'), '.invalid-feedback');
        $I->dontSee(\Yii::t('app.basic', 'Body cannot be blank'), '.invalid-feedback');
        $I->dontSee(\Yii::t('app.basic', 'The verification code is incorrect'), '.invalid-feedback');
    }

    /**
     * testContactFormSubmitFormSuccessDataTest
     */
    public function testContactFormSubmitFormSuccessDataTest(FunctionalTester $I): void
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
        $I->dontSeeElement('#contact-form');
        $I->see(\Yii::t(
            'app.basic',
            'Thank you for contacting us. We will respond to you as soon as possible.'
        ), '.alert');
    }
}
