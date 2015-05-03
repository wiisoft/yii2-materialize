<?php
/**
 * Created by PhpStorm.
 * User: zimovid
 * Date: 03.05.15
 * Time: 16:49
 */

namespace wii\materialize;


use yii\base\InvalidConfigException;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

class NavBarWidget extends Widget
{

    public $navbarOptions;

    public $navbarFixed = false;

    public $logo;

    public $logoOptions ='left';

    public $mobileLogo;

    public $menuItems = [];

    public $menuItemsOptions;

    public $mobileMenuItems = [];

    public function init()
    {

        $is_fixed = [];
        if ($this->navbarFixed) {
            $is_fixed = ArrayHelper::merge([], ['class' => 'navbar-fixed']);
        }
        echo Html::beginTag('div', $is_fixed);
        echo Html::beginTag('nav', []);
        echo Html::beginTag('div', ["class" => "nav-wrapper $this->navbarOptions"]);

        echo Html::a($this->logo, Url::home(), ["class" => "brand-logo  $this->logoOptions"]);
        if (!empty($this->mobileLogo)) {
            echo Html::a($this->mobileLogo, Url::home(), ['class' => 'brand-logo']);
        }
        echo Html::a('<i class="mdi-navigation-menu"></i>', '#', [
            'class' => 'button-collapse',
            'data-activates' => 'mobile-menu'
        ]);
        if (empty($this->menuItemsOptions)) {
            $this->menuItemsOptions = 'right';
        }
        echo Html::beginTag('ul', ['id' => 'main-menu', "class" => "$this->menuItemsOptions hide-on-med-and-down"]);
        foreach ($this->menuItems as $values) {

            echo  $this->renderMenuItems($values);
        }
        echo Html::endTag('ul');
        if (empty($this->mobileMenuItems)) {
            echo Html::beginTag('ul', ['id' => 'mobile-menu', 'class' => 'side-nav']);
            foreach ($this->menuItems as $values) {

                echo  $this->renderMenuItems($values);
            }
            echo Html::endTag('ul');
        }
        echo Html::endTag('div');
        echo Html::endTag('nav');
        echo Html::endTag('div');
    }

    public function renderMenuItems($menuItems)
    {

        if (!isset($menuItems['label'])) {
            throw new InvalidConfigException(\Yii::t('fronted', "The 'label' option is required."));
        }
        return Html::tag('li', Html::a($menuItems['label'], $menuItems['url'][0]),(Url::current()=='site/'. $menuItems['url'][0])?['class'=>'active']:[]);
    }
}