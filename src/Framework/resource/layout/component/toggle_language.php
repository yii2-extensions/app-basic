<?php

declare(strict_types=1);

use App\Framework\Asset\LocaleAsset;
use PHPForge\Component\Dropdown;
use PHPForge\Component\Item;
use PHPForge\Html\ButtonToggle;
use yii\helpers\Url;
use yii\web\View;

/**
 * @var string $languageLabel
 * @var View $this
 */
LocaleAsset::register($this);

echo Dropdown::widget()
    ->container(true)
    ->containerClass('btn-group dropup ms-3')
    ->items(
        Item::create()
            ->label(Yii::t('app.basic', 'Chinese'))
            ->iconClass('fi fi-cn fis me-2')
            ->link(Url::current(['language' => 'zh']))
            ->linkClass('dropdown-item d-flex align-items-center')
            ->active(Yii::$app->language === 'zh-CN'),
        Item::create()
            ->label(Yii::t('app.basic', 'German'))
            ->iconClass('fi fi-de fis me-2')
            ->link(Url::current(['language' => 'de']))
            ->linkClass('dropdown-item d-flex align-items-center')
            ->active(Yii::$app->language === 'de-DE'),
        Item::create()
            ->label(Yii::t('app.basic', 'English'))
            ->iconClass('fi fi-us fis me-2')
            ->link(Url::current(['language' => 'en']))
            ->linkClass('dropdown-item d-flex align-items-center')
            ->active(Yii::$app->language === 'en-US'),
        Item::create()
            ->label(Yii::t('app.basic', 'French'))
            ->iconClass('fi fi-fr fis me-2')
            ->link(Url::current(['language' => 'fr']))
            ->linkClass('dropdown-item d-flex align-items-center')
            ->active(Yii::$app->language === 'fr-FR'),
        Item::create()
            ->label(Yii::t('app.basic', 'Portuguese'))
            ->iconClass('fi fi-pt fis me-2')
            ->link(Url::current(['language' => 'pt']))
            ->linkClass('dropdown-item d-flex align-items-center')
            ->active(Yii::$app->language === 'pt-BR'),
        Item::create()
            ->label(Yii::t('app.basic', 'Spanish'))
            ->iconClass('fi fi-es fis me-2')
            ->link(Url::current(['language' => 'es']))
            ->linkClass('dropdown-item d-flex align-items-center')
            ->active(Yii::$app->language === 'es-ES'),
        Item::create()
            ->label(Yii::t('app.basic', 'Russian'))
            ->iconClass('fi fi-ru fis me-2')
            ->link(Url::current(['language' => 'ru']))
            ->linkClass('dropdown-item d-flex align-items-center')
            ->active(Yii::$app->language === 'ru-RU'),
    )
    ->listClass('dropdown-menu dropdown-menu-end shadow')
    ->toggleButton(
        ButtonToggle::widget()
            ->ariaExpanded('false')
            ->ariaLabel('Toggle language dropdown')
            ->class('btn btn-bd-primary dropdown-toggle d-flex align-items-center text-secondary-emphasis')
            ->dataBsToggle('dropdown')
            ->id('toggle-language')
            ->toggleContent(Yii::t('app.basic', $languageLabel))
    );
