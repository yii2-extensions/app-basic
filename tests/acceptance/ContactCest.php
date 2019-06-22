<?php

namespace Terabytesoft\App\AppBasic;

use Terabytesoft\App\Basic\AcceptanceTester;

/**
 * Class ContactCest.
 *
 * Acceptance tests for codeception
 */
class ContactCest
{
    /**
     * _before
     *
     * @param AcceptanceTester $I
     */
    public function _before(AcceptanceTester $I): void
    {
        $I->amOnPage('/site/contact');
        $I->wait(5); // secs
    }

    /**
     * testContactPageTest
     *
     * @param AcceptanceTester $I
     */
    public function testContactPageTest(AcceptanceTester $I): void
    {
        $I->wantTo('ensure that contact page works.');
        $I->see(\Yii::t('AppBasic', 'Contact'), 'h1');
    }

    /**
     * testcontactSubmitFormEmptyDataTest
     *
     * @param AcceptanceTester $I
     */
    public function testcontactSubmitFormEmptyDataTest(AcceptanceTester $I): void
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

    /**
     * testContactSubmitFormEmailWrongDataTest
     *
     * @param AcceptanceTester $I
     */
    public function testContactSubmitFormEmailWrongDataTest(AcceptanceTester $I): void
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

    /**
     * testContactSubmitFormSuccessDataTest
     *
     * @param AcceptanceTester $I
     */
    public function testContactSubmitFormSuccessDataTest(AcceptanceTester $I):void
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
