<?php

declare(strict_types=1);

use app\usecase\contact\ContactForm;
use yii\{bootstrap5\ActiveForm, captcha\Captcha, symfonymailer\Mailer, web\Session, web\View};
use yii\helpers\Html;

/**
 * @var ContactForm $model
 * @var Mailer $mailer
 * @var Session $session
 * @var View $this
 */
$this->title = Yii::t('app.basic', 'Contact');
$tabInput = 1;
?>
<div class="container mt-3">
    <div class="row align-items-center justify-content-center">
        <div class="col-md-5 col-sm-12">
            <div class="bg-body-tertiary shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
                <h1 class="fw-bold"><?= Html::encode($this->title) ?></h1>
                <p><?= Yii::t('app.basic', 'Please fill out the following form to contact us.') ?></p>
                <hr class="mb-3">
                <?php $form = ActiveForm::begin(
                    [
                        'id' => 'contact-form',
                        'layout' => ActiveForm::LAYOUT_FLOATING,
                    ],
                ) ?>
                <?= $form->field($model, 'name')->textInput(
                    [
                        'autofocus' => true,
                        'oninvalid' => 'this.setCustomValidity("' . Yii::t('app.basic', 'Enter Username Here') . '")',
                        'required' => true,
                        'tabindex' => $tabInput++,
                    ],
                ) ?>
                <?= $form->field($model, 'email')->textInput(
                    [
                        'oninvalid' => 'this.setCustomValidity("' . Yii::t('app.basic', 'Enter Email Here') . '")',
                        'required' => true,
                        'tabindex' => $tabInput++,
                    ],
                ) ?>
                <?= $form->field($model, 'subject')->textInput(
                    [
                        'oninvalid' => 'this.setCustomValidity("' . Yii::t('app.basic', 'Enter Subject Here') . '")',
                        'required' => true,
                        'tabindex' => $tabInput++,
                    ],
                ) ?>
                <?= $form->field($model, 'body')->textarea(
                    [
                        'oninvalid' => 'this.setCustomValidity("' . Yii::t('app.basic', 'Enter Body Here') . '")',
                        'required' => true,
                        'style' => 'height: 100px',
                        'tabindex' => $tabInput++,
                    ],
                ) ?>
                <?= $form->field($model, 'verifyCode', ['labelOptions' => ['id' => 'verifyCode']])->widget(
                    Captcha::class,
                    [
                        'captchaAction' => 'contact/captcha',
                        'template' => '{input}<div class="text-center mt-3 mb-3">' . '<b>' .
                        Yii::t('app.basic', 'Captcha Code') . ': ' . '</b>' . '{image}</div>',
                        'options' => [
                            'class' => 'form-control',
                            'oninvalid' => 'this.setCustomValidity("' .
                            Yii::t('app.basic', 'Enter Captcha Code Here') . '")',
                            'required' => true,
                            'tabindex' => $tabInput++,
                        ],
                    ],
                ) ?>
                <div class="d-grid gap-2">
                    <?= Html::submitButton(
                        Yii::t('app.basic', 'Contact us'),
                        [
                            'class' => 'btn btn-lg btn-primary btn-block',
                            'name' => 'contact-button',
                            'tabindex' => $tabInput++,
                        ],
                    ) ?>
                <?php ActiveForm::end() ?>
            </div>
        </div>
    </div>
    <p class="text-center mt-5">
        <?php if ($session->hasFlash('contactFormSubmitted')) : ?>
            <hr>
            <p class="text-success">
                <?= Yii::t(
                    'app.basic',
                    'Note that if you turn on the Yii debugger, you should be able to view the mail message on the ' .
                    'mail panel of the debugger.',
                ) ?>
                <br/>
                <br/>
                <?php if ($mailer->useFileTransport) : ?>
                    <?= Yii::t(
                        'app.basic',
                        'Because the application is in development mode, the email is not sent but saved as a file ' .
                        'under.',
                    ) ?>
                    <br/>
                    <?= '<code>' . Yii::getAlias($mailer->fileTransportPath) . '</code>' ?>
                    <br/>
                    <br/>
                    <?= Yii::t(
                        'app.basic',
                        'Please configure the <code>useFileTransport </code>property of the <code>mail ' .
                        '</code>application component to be false to enable email sending.',
                    ) ?>
                <?php endif ?>
            </p>
        <?php endif ?>
    </p>
</div>
