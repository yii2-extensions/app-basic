<?php

declare(strict_types=1);

use App\UseCase\Contact\ContactForm;
use PHPForge\Html\FormControl\Input\Submit;
use PHPForge\Html\Group\Div;
use PHPForge\Html\Group\P;
use PHPForge\Html\H;
use PHPForge\Html\Helper\Encode;
use PHPForge\Html\Tag;
use yii\bootstrap5\ActiveForm;
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
$tabInput = 1;
?>
<?= Div::widget()->class('container mt-3')->begin() ?>
    <?= Div::widget()->class('row align-items-center justify-content-center')->begin() ?>
        <?= Div::widget()->class('col-md-5 col-sm-12')->begin() ?>
            <?=
                Div::widget()
                    ->class('bg-body-tertiary shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500')
                    ->begin()
            ?>
                <?= H::widget()->content(Encode::content($this->title))->class('fw-bold')->tagName('h1') ?>
                <?= P::widget()->content(Yii::t('app.basic', 'Please fill out the following form to contact us.')) ?>
                <?= Tag::widget()->class('mb-3')->tagName('hr') ?>
                <?php $form = ActiveForm::begin(
                    [
                        'id' => 'contact-form',
                        'layout' => ActiveForm::LAYOUT_FLOATING,
                    ]
                ) ?>
                    <?=
                        $form->field($model, 'name')
                            ->textInput(
                                [
                                    'autofocus' => true,
                                    'oninvalid' => 'this.setCustomValidity("' . Yii::t('app.basic', 'Enter Username Here') .'")',
                                    'required' => true,
                                    'tabindex' => $tabInput++,
                                ]
                            )
                    ?>
                    <?=
                        $form->field($model, 'email')
                            ->textInput(
                                [
                                    'oninvalid' => 'this.setCustomValidity("' . Yii::t('app.basic', 'Enter Email Here') . '")',
                                    'required' => true,
                                    'tabindex' => $tabInput++,
                                ]
                            )
                    ?>
                    <?=
                        $form->field($model, 'subject')
                            ->textInput(
                                [
                                    'oninvalid' => 'this.setCustomValidity("' . Yii::t('app.basic', 'Enter Subject Here').'")',
                                    'required' => true,
                                    'tabindex' => $tabInput++,
                                ]
                            )
                    ?>
                    <?=
                        $form->field($model, 'body')
                            ->textarea(
                                [
                                    'oninvalid' => 'this.setCustomValidity("' . Yii::t('app.basic', 'Enter Body Here') . '")',
                                    'required' => true,
                                    'style' => 'height: 100px',
                                    'tabindex' => $tabInput++,
                                ]
                            )
                    ?>
                    <?=
                        $form->field($model, 'verifyCode', ['labelOptions' => ['id' => 'verifyCode']])
                            ->widget(
                                Captcha::class,
                                [
                                    'captchaAction' => 'contact/captcha',
                                    'template' => '{input}<div class="text-center mt-3 mb-3">' . '<b>' . Yii::t('app.basic', 'Captcha Code') . ': ' . '</b>' . '{image}</div>',
                                    'options' => [
                                        'class' => 'form-control',
                                        'oninvalid' => 'this.setCustomValidity("' . Yii::t('app.basic', 'Enter Captcha Code Here') . '")',
                                        'required' => true,
                                        'tabindex' => $tabInput++,
                                    ],
                                ]
                            )
                    ?>
                    <?=
                        Div::widget()
                            ->class('d-grid gap-2')
                            ->content(
                                Submit::widget()
                                    ->class('btn btn-lg btn-primary btn-block')
                                    ->name('contact-button')
                                    ->tabIndex($tabInput++)
                                    ->value(Yii::t('app.basic', 'Contact us'))
                        )
                    ?>
                <?php ActiveForm::end() ?>
            <?= Div::end() ?>
        <?= Div::end() ?>
    <?= Div::end() ?>
    <?= P::widget()->class('text-center mt-5')->begin() ?>
        <?php if ($session->hasFlash('contactFormSubmitted')) : ?>
            <?= Tag::widget()->tagName('hr') ?>
            <?= P::widget()->class('text-center')->begin() ?>
                <?= Yii::t(
                    'app.basic',
                    'Note that if you turn on the Yii debugger, you should be able to view the mail message on the mail panel of the debugger.'
                ) ?>
                <br/>
                <br/>
                <?php if ($mailer->useFileTransport) : ?>
                    <?= Yii::t(
                        'app.basic',
                        'Because the application is in development mode, the email is not sent but saved as a file under.'
                    ) ?>
                    <br/>
                    <?= '<code>' . Yii::getAlias($mailer->fileTransportPath) . '</code>' ?>
                    <br/>
                    <br/>
                    <?= Yii::t(
                        'app.basic',
                        'Please configure the <code>useFileTransport </code>property of the <code>mail </code>application component to be false to enable email sending.'
                    ) ?>
                <?php endif ?>
            <?= P::end() ?>
        <?php endif ?>
    <?= P::end() ?>
<?= Div::end();
