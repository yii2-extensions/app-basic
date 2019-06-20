<?php

namespace Terabytesoft\App\AppBasic;

use Terabytesoft\App\Basic\AcceptanceTester;

class ContactCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/site/contact');
        $I->wait(5); // secs
    }

    public function contactPageTest(AcceptanceTester $I)
    {
        $I->wantTo('ensure that contact page works.');
        $I->see(\Yii::t('AppBasic', 'Contact'), 'h1');
    }

    public function contactSubmitFormEmptyDataTest(AcceptanceTester $I)
    {
        $I->amGoingTo('contact submit form with empty data.');
        $I->click('contact-button');
        $I->wait(5); // secs
        $I->expectTo('see validations errors.');
        $I->see(\Yii::t('AppBasic', 'Name cannot be blank.'));
        $I->see(\Yii::t('AppBasic', 'Email cannot be blank.'));
        $I->see(\Yii::t('AppBasic', 'Subject cannot be blank.'));
        $I->see(\Yii::t('AppBasic', 'Body cannot be blank.'));
    }

    public function contactSubmitFormEmailWrongDataTest(AcceptanceTester $I)
    {
        $I->amGoingTo('contact submit form with email wrong.');
        $I->fillField('#contactform-name', 'tester');
        $I->fillField('#contactform-email', 'tester@example');
        $I->fillField('#contactform-subject', 'test subject');
        $I->fillField('#contactform-body', 'test content');
        $I->fillField('#contactform-verifycode', 'testme');
        $I->click('contact-button');
        $I->wait(5); // secs
        $I->expectTo('Email is not a valid email address.');
        $I->see(\Yii::t('AppBasic', 'Email is not a valid email address.'));
    }

    public function contactSubmitFormSuccessDataTest(AcceptanceTester $I)
    {
        $I->amGoingTo('contact submit form with success data.');
        $I->fillField('#contactform-name', 'tester');
        $I->fillField('#contactform-email', 'tester@example.com');
        $I->fillField('#contactform-subject', 'test subject');
        $I->fillField('#contactform-body', 'test content');
        $I->fillField('#contactform-verifycode', 'testme');
        $I->click('contact-button');
        $I->wait(5); // secs
        $I->expectTo('success.');
        $I->dontSeeElement('#contact-form');
        $I->see(\Yii::t('AppBasic', 'Thank you for contacting us. We will respond to you as soon as possible.'));
    }
}
