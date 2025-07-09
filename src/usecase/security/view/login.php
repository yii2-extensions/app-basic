<?php

declare(strict_types=1);

use app\usecase\security\Identity;
use yii\bootstrap5\{ActiveForm, Html};

/**
 * @var app\usecase\security\LoginForm $model
 * @var yii\bootstrap5\ActiveForm $form
 * @var yii\web\View $this
 */
$this->title = 'Login';
$this->params['breadcrumbs'] = [$this->title];
$tabInput = 1;
?>

<div class="container py">
    <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
            <h1 class="display-5 fw-bold mb-1 login-title">
                <?= Html::encode($this->title) ?>
            </h1>
            <p class="lead login-subtitle">
                <?= Yii::t('app.basic', 'Welcome back! Please sign in to your account.') ?>
            </p>
            <hr class="w-25 mx-auto">
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body p-4 p-md-5">
                    <?php $form = ActiveForm::begin(
                        [
                            'id' => 'login-form',
                            'layout' => ActiveForm::LAYOUT_FLOATING,
                            'options' => ['class' => 'needs-validation', 'novalidate' => true],
                        ],
                    ) ?>

                        <!-- Username Field -->
                        <div class="mb-3">
                            <?= $form->field($model, 'username')->textInput(
                                [
                                    'autofocus' => true,
                                    'class' => 'form-control form-control-lg',
                                    'placeholder' => Yii::t('app.basic', 'Enter your username'),
                                    'required' => true,
                                    'tabindex' => $tabInput++,
                                ],
                            ) ?>
                        </div>

                        <!-- Password Field -->
                        <div class="mb-4">
                            <?= $form->field($model, 'password')->passwordInput(
                                [
                                    'class' => 'form-control form-control-lg',
                                    'placeholder' => Yii::t('app.basic', 'Enter your password'),
                                    'required' => true,
                                    'tabindex' => $tabInput++,
                                ],
                            ) ?>
                        </div>

                        <!-- Remember Me Checkbox -->
                        <div class="mb-4">
                            <div class="form-check">
                                <?= $form->field($model, 'rememberMe')->checkbox(
                                    [
                                        'labelOptions' => [
                                            'class' => 'form-check-label fw-medium text-body',
                                        ],
                                        'options' => [
                                            'class' => 'form-check-input',
                                        ],
                                    ],
                                ) ?>
                            </div>
                        </div>

                        <!-- Login Button -->
                        <div class="d-grid mb-4">
                            <?= Html::submitButton(
                                Yii::t('app.basic', 'Sign In'),
                                [
                                    'class' => 'btn btn-primary btn-lg py-3 fw-semibold rounded-3',
                                    'name' => 'login-button',
                                ],
                            ) ?>
                        </div>

                    <?php ActiveForm::end(); ?>

                    <!-- Demo Credentials Info -->
                    <div class="bg-body-tertiary rounded-3 p-3 text-center">
                        <h6 class="fw-semibold mb-2 text-body">Demo Credentials</h6>
                        <div class="row g-2">
                            <div class="col-6">
                                <div class="login-info rounded-2 p-2 border border-opacity-25">
                                    <div class="fw-semibold text-primary small">Admin Access</div>
                                    <div class="login-info-user small">admin / admin</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="login-info rounded-2 p-2 border border-opacity-25">
                                    <div class="fw-semibold text-primary small">Demo Access</div>
                                    <div class="login-info-user small">demo / demo</div>
                                </div>
                            </div>
                        </div>
                        <div class="small text-muted mt-2">
                            To modify credentials, check <code class="small"><?= Identity::class ?></code>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
