<?php

namespace terabytesoft\app\basic\tests;

use terabytesoft\app\basic\tests\AcceptanceTester;

/**
 * Class ContactCest
 *
 * Acceptance tests for codeception
 */
class ContactCest
{
    /**
     * _before
     */
    public function _before(AcceptanceTester $I): void
    {
        $I->wantTo('ensure that contact page works.');
        $I->amOnPage('/site/contact');
        $I->wait(5); // secs
    }

    /**
     * testContactPage
     */
    public function testContactPage(AcceptanceTester $I): void
    {
        $I->expectTo('see page contact.');
        $I->see(\Yii::t('app.basic', 'Contact'));
    }

    /**
     * testcontactSubmitFormEmptyData
     */
    public function testcontactSubmitFormEmptyData(AcceptanceTester $I): void
    {
        $I->amGoingTo('contact submit form with empty data.');
        $I->click('contact-button');
        $I->wait(5); // secs

        $I->expectTo('see validations errors.');
        $I->see(\Yii::t('app.basic', 'Name cannot be blank.'));
        $I->see(\Yii::t('app.basic', 'Email cannot be blank.'));
        $I->see(\Yii::t('app.basic', 'Subject cannot be blank.'));
        $I->see(\Yii::t('app.basic', 'Body cannot be blank.'));
    }

    /**
     * testContactSubmitFormEmailWrongData
     */
    public function testContactSubmitFormEmailWrongData(AcceptanceTester $I): void
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
        $I->see(\Yii::t('app.basic', 'Email is not a valid email address.'));
    }

    /**
     * testContactSubmitFormSuccessData
     */
    public function testContactSubmitFormSuccessData(AcceptanceTester $I):void
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
        $I->see(\Yii::t('app.basic', 'Thank you for contacting us. We will respond to you as soon as possible.'));
    }
}
