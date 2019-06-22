<?php

namespace Terabytesoft\App\Basic;

use Terabytesoft\App\Basic\FunctionalTester;

/**
 * Class ContactFormCest.
 *
 * Functional tests for codeception
 */
class ContactFormCest
{
    /**
     * _before
     *
     * @param FunctionalTester $I
     */
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage('/site/contact');
    }

    /**
     * testContactFormPageTest
     *
     * @param FunctionalTester $I
     */
    public function testContactFormPageTest(FunctionalTester $I): void
    {
        $I->see(\Yii::t('basic', 'Contact'), 'h1');
    }

    /**
     * testContactFormSubmitFormEmptyDataTest
     *
     * @param FunctionalTester $I
     */
    public function testContactFormSubmitFormEmptyDataTest(FunctionalTester $I): void
    {
        $I->amGoingTo('contact form submit form with empty data.');
        $I->submitForm('#contact-form', []);
        $I->expectTo('see validations errors.');
        $I->see(\Yii::t('basic', 'Name cannot be blank.'), '.invalid-feedback');
        $I->see(\Yii::t('basic', 'Email cannot be blank.'), '.invalid-feedback');
        $I->see(\Yii::t('basic', 'Subject cannot be blank.'), '.invalid-feedback');
        $I->see(\Yii::t('basic', 'Body cannot be blank.'), '.invalid-feedback');
    }

    /**
     * testContactFormSubmitFormEmailWrongDataTest
     *
     * @param FunctionalTester $I
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
        $I->see(\Yii::t('basic', 'Email is not a valid email address.'), '.invalid-feedback');
        $I->dontSee(\Yii::t('basic', 'Subject cannot be blank'), '.invalid-feedback');
        $I->dontSee(\Yii::t('basic', 'Body cannot be blank'), '.invalid-feedback');
        $I->dontSee(\Yii::t('basic', 'The verification code is incorrect'), '.invalid-feedback');
    }

    /**
     * testContactFormSubmitFormSuccessDataTest
     *
     * @param FunctionalTester $I
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
            'basic',
            'Thank you for contacting us. We will respond to you as soon as possible.'
        ), 'p');
    }
}
