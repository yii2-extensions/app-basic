<?php

declare(strict_types=1);

use yii\bootstrap5\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Html;

/**
 * @var app\usecase\contact\ContactForm $model
 * @var yii\web\View $this
 */
$this->title = Yii::t('app.basic', 'Contact');
$this->params['breadcrumbs'] = [$this->title];
$tabInput = 1;
?>

<div class="container py">
    <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
            <h1 class="display-5 fw-bold mb-1 contact-title">
                <?= Html::encode($this->title) ?>
            </h1>
            <p class="lead contact-subtitle">
                <?= Yii::t('app.basic', 'Please fill out the following form to contact us.') ?>
            </p>
            <hr class="w-25 mx-auto">
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body p-2 p-md-2">
                    <?php $form = ActiveForm::begin(
                        [
                            'id' => 'contact-form',
                            'layout' => ActiveForm::LAYOUT_FLOATING,
                            'options' => ['class' => 'needs-validation', 'novalidate' => true],
                        ],
                    ) ?>

                        <!-- Name and Email Fields -->
                        <div class="row g-3 mb-2">
                            <div class="col-md-6">
                                <?= $form->field($model, 'name')->textInput(
                                    [
                                        'autofocus' => true,
                                        'class' => 'form-control form-control-lg',
                                        'placeholder' => Yii::t(
                                            'app.basic',
                                            'Your full name',
                                        ),
                                        'required' => true,
                                        'tabindex' => $tabInput++,
                                    ],
                                ) ?>
                            </div>
                            <div class="col-md-6">
                                <?= $form->field($model, 'email')->textInput(
                                    [
                                        'class' => 'form-control form-control-lg',
                                        'placeholder' => Yii::t(
                                            'app.basic',
                                            'your.email@example.com',
                                        ),
                                        'required' => true,
                                        'tabindex' => $tabInput++,
                                    ],
                                ) ?>
                            </div>
                        </div>

                        <!-- Subject -->
                        <div class="mb-2">
                            <?= $form->field($model, 'subject')->textInput(
                                [
                                    'class' => 'form-control form-control-lg',
                                    'placeholder' => Yii::t('app.basic', 'What is this about?'),
                                    'required' => true,
                                    'tabindex' => $tabInput++,
                                ],
                            ) ?>
                        </div>

                        <!-- Message body -->
                        <div class="mb-3">
                            <?= $form->field($model, 'body')->textarea(
                                [
                                    'class' => 'form-control',
                                    'rows' => 6,
                                    'placeholder' => Yii::t(
                                        'app.basic',
                                        'Tell us more about your inquiry...',
                                    ),
                                    'required' => true,
                                    'style' => 'resize: vertical; min-height: 150px;',
                                    'tabindex' => $tabInput++,
                                ],
                            ) ?>
                        </div>

                        <!-- Captcha -->
                        <div class="mb-3">
                            <div class="text-center mb-3">
                                <h6 class="fw-semibold text-muted mb-3">Security Verification</h6>
                            </div>
                            <div class="card bg-body-tertiary border border-opacity-25">
                                <div class="card-body text-center py-2">
                                    <?= $form->field(
                                        $model,
                                        'verifyCode',
                                        [
                                            'template' => '{input}{error}',
                                            'options' => [
                                                'class' => 'mb-2',
                                            ],
                                        ],
                                    )->widget(
                                        Captcha::class,
                                        [
                                            'captchaAction' => 'contact/captcha',
                                            'template' => '<div class="d-flex align-items-center justify-content-center mb-3"><span class="me-3 fw-semibold text-body">Captcha Code:</span>{image}</div>{input}',
                                            'options' => [
                                                'class' => 'form-control form-control-lg text-center',
                                                'placeholder' => Yii::t(
                                                    'app.basic',
                                                    'Enter the code above',
                                                ),
                                                'required' => true,
                                                'tabindex' => $tabInput++,
                                            ],
                                        ],
                                    ) ?>
                                </div>
                            </div>
                        </div>

                        <!-- Submit button -->
                        <div class="d-grid">
                            <?= Html::submitButton(
                                Yii::t('app.basic', 'Contact us'),
                                [
                                    'class' => 'btn btn-primary btn-lg py fw-semibold rounded-3',
                                    'name' => 'contact-button',
                                    'tabindex' => $tabInput++,
                                ],
                            ) ?>
                        </div>

                    <?php ActiveForm::end() ?>
                </div>
            </div>
        </div>

        <!-- Contact Information Sidebar -->
        <div class="col-lg-4 col-md-8 mt-4 mt-lg-0">
            <div class="ps-lg-4">
                <div class="card h-100 border-0 bg-body-tertiary">
                    <div class="card-body p-4">
                        <h4 class="h5 fw-bold mb-4 text-center text-body">Get in Touch</h4>

                        <div class="d-flex align-items-start mb-3">
                            <div class="flex-shrink-0 me-3">
                                <div class="bg-primary bg-opacity-10 rounded-circle p-2">
                                    <i class="bi bi-geo-alt-fill text-primary"></i>
                                </div>
                            </div>
                            <div>
                                <h6 class="fw-semibold mb-1 text-body">Address</h6>
                                <p class="text-muted mb-0 small">123 Main Street<br>City, State 12345</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-start mb-3">
                            <div class="flex-shrink-0 me-3">
                                <div class="bg-primary bg-opacity-10 rounded-circle p-2">
                                    <i class="bi bi-telephone-fill text-primary"></i>
                                </div>
                            </div>
                            <div>
                                <h6 class="fw-semibold mb-1 text-body">Phone</h6>
                                <p class="text-muted mb-0 small">+1 (555) 123-4567</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-start mb-4">
                            <div class="flex-shrink-0 me-3">
                                <div class="bg-primary bg-opacity-10 rounded-circle p-2">
                                    <i class="bi bi-envelope-fill text-primary"></i>
                                </div>
                            </div>
                            <div>
                                <h6 class="fw-semibold mb-1 text-body">Email</h6>
                                <p class="text-muted mb-0 small">contact@example.com</p>
                            </div>
                        </div>
                        <hr class="my-4 border-opacity-25">
                        <h6 class="fw-semibold mb-3 text-center text-body">Business Hours</h6>
                        <ul class="list-unstyled mb-0 small">
                            <li class="d-flex justify-content-between py-1 border-bottom border-opacity-25">
                                <span class="text-body">Monday - Friday</span>
                                <span class="text-muted fw-semibold">9:00 AM to 6:00 PM</span>
                            </li>
                            <li class="d-flex justify-content-between py-1 border-bottom border-opacity-25">
                                <span class="text-body">Saturday</span>
                                <span class="text-muted fw-semibold">10:00 AM to 4:00 PM</span>
                            </li>
                            <li class="d-flex justify-content-between py-1">
                                <span class="text-body">Sunday</span>
                                <span class="text-muted fw-semibold">Closed</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
