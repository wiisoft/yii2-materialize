Materialize for Yii2
====================

This is a set of widgets based on an improved version of MAZA [CSS framework](https://github.com/wiisoft/maza) - 
Materialize[CSS framework](http://materializecss.com/) for Yii2.

This modified fork https://github.com/webmaxx/yii2-materialize.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist wiisoft/yii2-materialize "*"
```

or add

```
"wiisoft/yii2-materialize": "*"
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

Navbar Widget with dropdown elemets
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
You can follow any responses to customize the display mobile menu with the parameter $mobileItems using
the same parameters as for $items.
If this parameter is $ mobileytems not specified, the menu specified in the $ items.

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
    'mobileItems'=>[
        [
            'label' => 'Home',
            'url' => ['site/index'],
            'linkOptions' => [],
        ],
        [
            'label' => 'Articles',
            'url' => ['service/articles']
        ],
        [
            'label' => 'Contacts',
            'url' => ['service/contacts']
        ]
     ],
    'options' => ['class' =>'nav-pills'], // set this to nav-tab to get tab-styled navigation
]);
```
Badge renders a materialize button.       
------------------------------------                                          
                               
                                          
```php                                    
echo Badge::widget([                      
    'label' => 'Action',                  
    'options' => ['class' => 'new'],      
]);                                       
```      
                                 
Button renders a materialize button.                                
------------------------------------                                            
```php                                     
echo Button::widget([                      
    'label' => 'Action',                   
    'options' => ['class' => 'btn-large'], 
]);                                        
``` 

Slider renders a slides HTML component.                                
------------------------------------                                            
```php                                                                                  
echo Slider::widget([                                                                    
        'items' =>[
            [
                'img' => "/tmp/1b.jpg",
                'imgOptions' => ['alt' => 'Test', 'Title' => 'Title', 'class' => 'myClass'],
                'title' => "Left Aligned Caption",
                'titleOptions' =>['id' => 'id', 'class' => 'titleClass'],
                'smallTitle' => "Here's our small slogan.",
                'smallTitleOptions' => ['class' => 'light grey-text text-lighten-3'],
                'itemOptions' => ['class' => 'center-align'],

            ],
            [
                'img' => "/tmp/2b.jpg",
                'title' => "Left Aligned Caption",
                'smallTitle' => "Here's our small slogan.",
                'smallTitleOptions' => ['class' => 'light grey-text text-lighten-3'],
                'itemOptions' => ['class' => 'left-align']
            ],
            [
                'img' => "/tmp/3b.jpg",
                'title' => "Left Aligned Caption",
                'smallTitle' => "Here's our small slogan.",
                'smallTitleOptions' => ['class' => 'light grey-text text-lighten-3'],
                'itemOptions' => ['class' => 'right-align']
            ],
        ],
        'options'=>['id'=>'options'],
        'slidesOptions'=>['class'=>'slidesOptions'],                                                                  
```                                                        

Card renders a card HTML component.                                
------------------------------------                                            
```php                                                                                  
echo Card::widget([                                                                                       
  'item' => [                                                                                             
             'img' => '/tmp/3.jpg',                                                                       
             'imgOptions' => ['class' => 'imgOptions', 'id' => 'imgOptions'],                             
             'cardImgOptions' => ['class' => 'cardImgOptions', 'id' => 'cardImgOptions'],                 
             'cardContentOptions' => ['class' => 'cardContentOptions', 'id' => 'cardContentOptions'],     
             'cardTitle'=>'Card Title',                                                                   
             'cardTitleOptions'=>['class'=>'cardTitleOptions','id'=>'cardTitleOptions'],                  
             'cardContent' => [                                                                           
                  [                                                                                       
                  'tag' => 'p',                                                                           
                  'body' => 'I am a very simple card. I am good at containing small bits of information.  
                  I am convenient because I require little markup to use effectively.'                    
                  ]                                                                                       
                                                                                                          
             ],                                                                                           
             'cardReveal' => [                                                                            
                 [                                                                                        
                     'tag' => 'span',                                                                     
                     'activator' => 'true',                                                               
                     'options' => [],                                                                     
                     'body' => ' Card Title <i class="fa fa-times right"></i>'                            
                 ],                                                                                       
                 [                                                                                        
                     'tag' => 'p',                                                                        
                     'options' => [],                                                                     
                     'body' => '<a href="#">This is a link</a>'                                           
                 ],                                                                                       
             ],                                                                                           
             'cardAction' => [                                                                            
                  [                                                                                       
                  'tag' => 'span',                                                                        
                  'body' => '<a href="#">This is a link</a>'                                              
                  ],                                                                                      
                 [                                                                                        
                 'tag' => 'span',                                                                         
                 'body' => '<a href="#">This is a link</a>'                                               
                 ],                                                                                       
             ],                                                                                           
         ],                                                                                               
     'options' => ['class' => 'wow bounceIn']                                                             
 ]);                                                                                                                                                                        
```                                                                                  