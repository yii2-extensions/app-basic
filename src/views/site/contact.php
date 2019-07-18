<?php

/**
 * contact.
 *
 * View web application basic
 **/

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\captcha\Captcha;

$this->title = $this->title = \Yii::t('app.basic', 'Contact');

?>

<?= Html::beginTag('div', ['class' => 'site-contact']) ?>

    <?= Html::tag(
        'h1',
        '<b>'.Html::encode($this->title).'</b>',
        ['class' => 'text-center c-grey-900 mb-40 display-4']
    ) ?>

    <?php if ($this->context->module->session->hasFlash('contactFormSubmitted')) : ?>

        <?= Html::tag('hr', '', ['class' => 'mb-2']) ?>

        <br/>

        <?= Html::beginTag('p') ?>
            <?= \Yii::t('app.basic', 'Note that if you turn on the Yii debugger, you should be able '.
                'to view the mail message on the mail panel of the debugger.').'</br></br>'
            ?>
            <?php if ($this->context->module->mailer->useFileTransport) : ?>
                <?= \Yii::t('app.basic', 'Because the application is in development mode, the email is not sent but '.
                    'saved as a file under:').'</br>' ?>
                <?= '<code>'.\Yii::getAlias($this->context->module->mailer->fileTransportPath).'</code>'.'</br></br>' ?>
                <?= \Yii::t(
                    'app.basic',
                    'Please configure the <code>useFileTransport</code> property of the <code>mail</code> '.
                    'application component to be false to enable email sending.'
                ) ?>
            <?php endif ?>
        <?= Html::endTag('p') ?>

        <?= $this->context->module->session->setFlash(
            'success',
            \Yii::t(
                'app.basic',
                'Thank you for contacting us. We will respond to you as soon as possible.'
            )
        ) ?>

    <?php else : ?>
        <?= Html::beginTag('p', ['class' => 'text-center mb-4']) ?>
            <?= \Yii::t('app.basic', 'If you have business inquiries or other questions,<br/> please fill out the '.
                'following form to contact us.<br/> <b>Thank you</b>.')
            ?>
        <?= Html::endTag('p') ?>

        <?php $form = ActiveForm::begin([
            'id'          => 'contact-form',
            'layout'      => 'default',
            'fieldConfig' => [
                'template'             => '{input}{label}{hint}{error}',
                'horizontalCssClasses' => [
                    'label'   => '',
                    'offset'  => '',
                    'wrapper' => '',
                    'error'   => 'text-center',
                    'hint'    => '',
                    'field'   => 'form-label-group',
                ],
                'options' => ['class' => 'form-label-group'],
            ],
            'options'          => ['class' => 'form-contact'],
            'validateOnType'   => false,
            'validateOnChange' => false,
        ]) ?>

            <?= $form->field($model, 'name')
                ->textInput([
                    'autofocus'   => true,
                    'oninput'     => 'this.setCustomValidity("")',
                    'oninvalid'   => 'this.setCustomValidity("'.\Yii::t('app.basic', 'Enter Username Here').'")',
                    'placeholder' => \Yii::t('app.basic', 'Username'),
                    'required'    => (YII_ENV === 'test') ? false : true,
                    'tabindex'    => '1',
                ])
                ->label(\Yii::t('app.basic', 'Username'))
            ?>

            <?= $form->field($model, 'email')
                ->textInput([
                    'oninput'     => 'this.setCustomValidity("")',
                    'oninvalid'   => 'this.setCustomValidity("'.\Yii::t('app.basic', 'Enter Email Here').'")',
                    'placeholder' => \Yii::t('app.basic', 'Email'),
                    'required'    => (YII_ENV === 'test') ? false : true,
                    'tabindex'    => '2',
                ])
                ->label(\Yii::t('app.basic', 'Email'))
            ?>

            <?= $form->field($model, 'subject')
                ->textInput([
                    'oninput'     => 'this.setCustomValidity("")',
                    'oninvalid'   => 'this.setCustomValidity("'.\Yii::t('app.basic', 'Enter Subject Here').'")',
                    'placeholder' => \Yii::t('app.basic', 'Subject'),
                    'required'    => (YII_ENV === 'test') ? false : true,
                    'tabindex'    => '3',
                ])
                ->label(\Yii::t('app.basic', 'Subject'))
            ?>

            <?= $form->field($model, 'body')
                ->textarea([
                    'oninput'     => 'this.setCustomValidity("")',
                    'oninvalid'   => 'this.setCustomValidity("'.\Yii::t('app.basic', 'Enter Body Here').'")',
                    'placeholder' => \Yii::t('app.basic', 'Body'),
                    'required'    => (YII_ENV === 'test') ? false : true,
                    'rows'        => 6,
                    'tabindex'    => '4',
                ])
                ->label(\Yii::t('app.basic', 'Body'))
            ?>

            <?= $form->field($model, 'verifyCode', [
                    'labelOptions' => ['id' => 'verifyCode'],
                ])->widget(
                    Captcha::class,
                    [
                        'template' => '{input}<div class="text-center">'.'<b>'.
                            \Yii::t('app.basic', 'Captcha Code').':'.'</b>'.'{image}</div>',
                        'options' => [
                            'class'       => 'form-control',
                            'oninput'     => 'this.setCustomValidity("")',
                            'oninvalid'   => 'this.setCustomValidity("'.
                                             \Yii::t('app.basic', 'Enter Captcha Code Here').'")',
                            'placeholder' => \Yii::t('app.basic', 'Captcha Code'),
                            'required'    => (YII_ENV === 'test') ? false : true,
                            'style'       => 'margin-bottom:10px',
                            'tabindex'    => '5',
                        ],
                    ]
                )
                ->label(\Yii::t('app.basic', 'Captcha Code'))
            ?>

            <?= Html::beginTag('div', ['class' => 'form-group']) ?>
                <?= Html::submitButton(\Yii::t('app.basic', 'Contact us'), [
                        'class' => 'btn btn-lg btn-primary btn-block', 'name' => 'contact-button', 'tabindex' => '6',
                    ]) ?>
            <?= Html::endTag('div') ?>

        <?php ActiveForm::end() ?>

    <?php endif ?>

<?php echo Html::endTag('div');
