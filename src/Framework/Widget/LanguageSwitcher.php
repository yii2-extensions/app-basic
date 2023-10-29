<?php

declare(strict_types=1);

namespace App\Framework\Widget;

use Yii;
use yii\base\Widget;
use yii\bootstrap5\ButtonDropdown;
use yii\helpers\Url;

final class LanguageSwitcher extends Widget
{
    public function run()
    {
        $languages = Yii::$app->params['app.languages'];

        $current = $languages[Yii::$app->language];
        unset($languages[Yii::$app->language]);

        $items = [];
        foreach ($languages as $code => $language) {
            $temp = [];
            $temp['label'] = $language;
            $temp['url'] = 'javascript:void(0);';
            $temp['linkOptions'] = [
                'class' => 'language-switch',
                'data-language' => $code,
            ];

            array_push($items, $temp);
        }

        echo ButtonDropdown::widget(
            [
                'label' => $current,
                'buttonOptions' => [
                    'class' => 'btn-secondary',
                ],
                'dropdown' => [
                    'items' => $items,
                ],
            ],
        );

        $Js = <<<JS
		$(document).ready(function(){
			$('.language-switch').on('click', function (event) {
				event.preventDefault(); // Prevenir el evento click
				var selectedLanguage = $(this).data('language');
				$.ajax({
					url: '/site/language',
					type: 'POST',
					data: {language: selectedLanguage},
					success: function () {
						location.reload(); // Reload the page to apply the selected language
					}
				});
			});
		});
		JS;

        $this->view->registerJs($Js);
    }
}
