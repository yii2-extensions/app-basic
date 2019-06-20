<?php

namespace Terabytesoft\App\Basic;

use Terabytesoft\App\Basic\FunctionalTester;

class ContactFormCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage('/site/contact');
    }

    public function contactFormPageTest(FunctionalTester $I)
    {
        $I->see(\Yii::t('basic', 'Contact'), 'h1');
    }

    public function contactFormSubmitFormEmptyDataTest(FunctionalTester $I)
    {
        $I->amGoingTo('contact form submit form with empty data.');
        $I->submitForm('#contact-form', []);
        $I->expectTo('see validations errors.');
        $I->see(\Yii::t('basic', 'Name cannot be blank.'), '.invalid-feedback');
        $I->see(\Yii::t('basic', 'Email cannot be blank.'), '.invalid-feedback');
        $I->see(\Yii::t('basic', 'Subject cannot be blank.'), '.invalid-feedback');
        $I->see(\Yii::t('basic', 'Body cannot be blank.'), '.invalid-feedback');
    }

    public function contactFormSubmitFormEmailWrongDataTest(FunctionalTester $I)
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

    public function contactFormSubmitFormSuccessDataTest(FunctionalTester $I)
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
