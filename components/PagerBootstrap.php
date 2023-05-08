<?php

namespace app\components;

use yii\helpers\Html;
use yii\widgets\LinkPager;

class PagerBootstrap extends LinkPager {
    public function init() {
        parent::init();
        Html::addCssClass($this->options, 'pagination');
    }

    protected function renderPageButtons() {
        $buttons = parent::renderPageButtons();
        $buttons = str_replace('<ul>', '<ul class="pagination">', $buttons);

        return $buttons;
    }

    protected function renderPageButton($label, $page, $class, $disabled, $active) {
        $class[] = 'page-item';
        $linkOptions = ['class' => 'page-link'];

        if ($active) {
            Html::addCssClass($linkOptions, 'active');
        }

        if ($disabled) {
            Html::addCssClass($linkOptions, 'disabled');
            return Html::tag('li', Html::tag('span', $label, ['class' => 'page-link']), ['class' => implode(' ', $class)]);
        }

        $linkOptions['href'] = $this->pagination->createUrl($page);
        return Html::tag('li', Html::a($label, '#', $linkOptions), ['class' => implode(' ', $class)]);
    }
}
