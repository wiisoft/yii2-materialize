Materialize for Yii2
====================
Materialize CSS framework for Yii2
This modified fork https://github.com/webmaxx/yii2-materialize

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist wii/yii2-materialize "*"
```

or add

```
"wii/yii2-materialize": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Navbar Widget
-------------
NavBar renders a navbar HTML component.

Any content enclosed between the [[begin()]] and [[end()]] calls of NavBar
is treated as the content of the navbar. You may use widgets such as [[Nav]]
or [[\yii\widgets\Menu]] to build up such content. For example,

```php
use wii\materializee\Nav;
use wii\materializee\NavBar;

NavBar::begin(['brandLabel' => 'NavBar Test']);
echo Nav::widget([
    'items' => [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
    ],
]);
NavBar::end();

```

Navbar  Widget with dropdown elemets
------------------------------------
```php
echo Nav::widget([
    'items' => [
        [
            'label' => 'Home',
            'url' => ['site/index'],
            'linkOptions' => [...],
        ],
        [
            'label' => 'Dropdown',
            'items' => [
                 ['label' => 'Level 1 - Dropdown A', 'url' => '#'],
                 '<li class="divider"></li>',
                 '<li class="dropdown-header">Dropdown Header</li>',
                 ['label' => 'Level 1 - Dropdown B', 'url' => '#'],
            ],
        ],
    ],
    'options' => ['class' =>'nav-pills'], // set this to nav-tab to get tab-styled navigation
]);
```



