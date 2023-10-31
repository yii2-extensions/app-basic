<?php

declare(strict_types=1);

use App\Framework\Asset\LocaleAsset;
use yii\bootstrap5\ButtonDropdown;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

/**
 * @var string $languageLabel
 * @var View $this
 */
LocaleAsset::register($this);
?>
<?= Html::tag(
    'li',
    ButtonDropdown::widget(
        [
            'buttonOptions' => [
                'class' => 'text-secondary-emphasis',
            ],
            'id' => 'toggle-language',
            'label' => Yii::t('app.basic', $languageLabel),
            'dropdown' => [
                'items' => [
                    [
                        'label' => Html::tag(
                            'span',
                            Html::tag('i', '', ['class' => 'fi fi-cn fis me-2']) . Yii::t('app.basic', 'Chinese'),
                        ),
                        'url' => Url::current(['language' => 'zh']),
                        'encode' => false,
                        'active' => Yii::$app->language === 'zh',
                    ],
                    [
                        'label' => Html::tag(
                            'span',
                            Html::tag('i', '', ['class' => 'fi fi-de fis me-2']) . Yii::t('app.basic', 'German'),
                        ),
                        'url' => Url::current(['language' => 'de']),
                        'encode' => false,
                        'active' => Yii::$app->language === 'de',
                    ],
                    [
                        'label' => Html::tag(
                            'span',
                            Html::tag('i', '', ['class' => 'fi fi-us fis me-2']) . Yii::t('app.basic', 'English'),
                        ),
                        'url' => Url::current(['language' => 'en']),
                        'encode' => false,
                        'active' => Yii::$app->language === 'en',
                    ],
                    [
                        'label' => Html::tag(
                            'span',
                            Html::tag('i', '', ['class' => 'fi fi-fr fis me-2']) . Yii::t('app.basic', 'French'),
                        ),
                        'url' => Url::current(['language' => 'fr']),
                        'encode' => false,
                        'active' => Yii::$app->language === 'fr',
                    ],
                    [
                        'label' => Html::tag(
                            'span',
                            Html::tag('i', '', ['class' => 'fi fi-pt fis me-2']) . Yii::t('app.basic', 'Portuguese'),
                        ),
                        'url' => Url::current(['language' => 'pt']),
                        'encode' => false,
                        'active' => Yii::$app->language === 'pt',
                    ],
                    [
                        'label' => Html::tag(
                            'span',
                            Html::tag('i', '', ['class' => 'fi fi-es fis me-2']) . Yii::t('app.basic', 'Spanish'),
                        ),
                        'url' => Url::current(['language' => 'es']),
                        'encode' => false,
                        'active' => Yii::$app->language === 'es',
                    ],
                    [
                        'label' => Html::tag(
                           'span',
                            Html::tag('i', '', ['class' => 'fi fi-ru fis me-2']) . Yii::t('app.basic', 'Russian'),
                        ),
                        'url' => Url::current(['language' => 'ru']),
                        'encode' => false,
                        'active' => Yii::$app->language === 'ru',
                    ],
                ],
            ],
        ],
    ),
);
