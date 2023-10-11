<?php

declare(strict_types=1);

use App\UseCase\Contact\ContactForm;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\captcha\Captcha;
use yii\symfonymailer\Mailer;
use yii\web\Session;
use yii\web\View;

/**
 * @var ContactForm $model
 * @var Mailer $mailer
 * @var Session $session
 * @var View $this
 */
$this->title = $this->title = Yii::t('app.basic', 'Contact');
?>
<?= Html::beginTag('div', ['class' => 'container site-contact mt-5']) ?>
    <?php if ($session->hasFlash('contactFormSubmitted')) : ?>
        <?= Html::tag(
            'div',
            Yii::t(
                'app.basic',
                'Thank you for contacting us. We will respond to you as soon as possible.'
            ) .
            Html::button(
                '',
                ['class' => 'btn-close', 'data-bs-dismiss' => 'alert', 'aria-label' => 'Close']
            ),
            ['class' => 'alert alert-success alert-dismissible fade show', 'role' => 'alert'],
        ) ?>
        <?= Html::tag('hr', '', ['class' => 'mb-2']) ?>
        <br/>
        <?= Html::beginTag('p') ?>
            <?= Yii::t(
                'app.basic',
                'Note that if you turn on the Yii debugger, you should be able to view the mail message on the mail panel of the debugger.'
            ) ?>
            <?php if ($mailer->useFileTransport) : ?>
                <?= Yii::t(
                    'app.basic',
                    'Because the application is in development mode, the email is not sent but saved as a file under:'
                ) ?>
                <?= '<code>' . Yii::getAlias($mailer->fileTransportPath) . '</code>' ?>
                <?= Yii::t(
                    'app.basic',
                    'Please configure the <code>useFileTransport </code>property of the <code>mail </code>application component to be false to enable email sending.'
                ) ?>
            <?php endif ?>
        <?= Html::endTag('p') ?>
    <?php endif ?>
    <?= Html::tag(
        'h1',
        '<b>'.Html::encode($this->title).'</b>',
        ['class' => 'text-center c-grey-900 mb-40 display-4']
    ) ?>
    <?php $form = ActiveForm::begin(
        [
            'id' => 'contact-form',
            'layout' => 'default',
            'fieldConfig' => [
                'template' => '{input}{label}{hint}{error}',
                'horizontalCssClasses' => [
                    'error' => 'text-center',
                    'field' => 'form-label-group',
                ],
                'options' => ['class' => 'form-label-group'],
            ],
            'options' => ['class' => 'form-contact'],
            'validateOnType' => false,
            'validateOnChange' => false,
        ]
    ) ?>
        <?= $form->field($model, 'name')
            ->textInput(
                [
                    'autofocus' => true,
                    'oninput' => 'this.setCustomValidity("")',
                    'oninvalid' => 'this.setCustomValidity("' . Yii::t('app.basic', 'Enter Username Here') .'")',
                    'placeholder' => Yii::t('app.basic', 'Username'),
                    'required' => (YII_ENV === 'test') ? false : true,
                    'tabindex' => '1',
                ]
            )
            ->label(Yii::t('app.basic', 'Username'))
        ?>
        <?= $form->field($model, 'email')
            ->textInput(
                [
                    'oninput' => 'this.setCustomValidity("")',
                    'oninvalid' => 'this.setCustomValidity("' . Yii::t('app.basic', 'Enter Email Here') . '")',
                    'placeholder' => Yii::t('app.basic', 'Email'),
                    'required' => (YII_ENV === 'tests') ? false : true,
                    'tabindex' => '2',
                ]
            )
            ->label(Yii::t('app.basic', 'Email'))
        ?>
        <?= $form->field($model, 'subject')
            ->textInput(
                [
                    'oninput' => 'this.setCustomValidity("")',
                    'oninvalid' => 'this.setCustomValidity("' . Yii::t('app.basic', 'Enter Subject Here').'")',
                    'placeholder' => Yii::t('app.basic', 'Subject'),
                    'required' => (YII_ENV === 'test') ? false : true,
                    'tabindex' => '3',
                ]
            )
            ->label(Yii::t('app.basic', 'Subject'))
        ?>
        <?= $form->field($model, 'body')
            ->textarea(
                [
                    'oninput' => 'this.setCustomValidity("")',
                    'oninvalid' => 'this.setCustomValidity("' . Yii::t('app.basic', 'Enter Body Here') . '")',
                    'placeholder' => Yii::t('app.basic', 'Body'),
                    'required' => (YII_ENV === 'test') ? false : true,
                    'rows' => 6,
                    'tabindex' => '4',
                ]
            )
            ->label(Yii::t('app.basic', 'Body'))
        ?>
        <?= $form->field($model, 'verifyCode', ['labelOptions' => ['id' => 'verifyCode']])
            ->widget(
                Captcha::class,
                [
                    'captchaAction' => 'contact/captcha',
                    'template' => '{input}<div class="text-center">' . '<b>' . Yii::t('app.basic', 'Captcha Code') . ': ' . '</b>' . '{image}</div>',
                    'options' => [
                        'class' => 'form-control',
                        'oninput' => 'this.setCustomValidity("")',
                        'oninvalid' => 'this.setCustomValidity("' . Yii::t('app.basic', 'Enter Captcha Code Here') . '")',
                        'placeholder' => Yii::t('app.basic', 'Captcha Code'),
                        'required' => (YII_ENV === 'test') ? false : true,
                        'style' => 'margin-bottom:10px',
                        'tabindex' => '5',
                    ],
                ]
            )
            ->label(Yii::t('app.basic', 'Captcha Code'))
        ?>
        <?= Html::beginTag('div', ['class' => 'd-grid gap-2']) ?>
            <?= Html::submitButton(
                    Yii::t('app.basic', 'Contact us'),
                    ['class' => 'btn btn-lg btn-primary btn-block', 'name' => 'contact-button', 'tabindex' => '6']
            ) ?>
        <?= Html::endTag('div') ?>
        <?= Html::beginTag('p', ['class' => 'text-center mt-5']) ?>
            <?= Yii::t(
                'app.basic',
                'If you have business inquiries or other questions,<br/> please fill out the following form to contact us.<br/> <b>Thank you</b>.'
            ) ?>
        <?= Html::endTag('p') ?>
    <?php ActiveForm::end() ?>
<?= Html::endTag('div');
