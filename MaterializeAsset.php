<?php
/**
 * Created by PhpStorm.
 * User: zimovid
 * Date: 30.03.15
 * Time: 18:35
 */

namespace wii\materialize;


use yii\web\AssetBundle;

use Yii;

/**
 * Asset packages for the Materialize.
 * Class MaterializeAsset
 * @package wii\materialize
 */
class MaterializeAsset extends AssetBundle
{
    public $sourcePath = '@bower/materialize/dist';
    public $css = [
        'css/materialize.min.css',
    ];

    public $js = [
        'js/materialize.min.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}