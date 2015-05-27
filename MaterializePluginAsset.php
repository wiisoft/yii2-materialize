<?php namespace wii\materialize;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Materialize javascript files.
 *
 * @author wiisoft <webdev@webmaker.today>
 * @since 1.0
 */
class MaterializePluginAsset extends AssetBundle
{
    public $sourcePath = '@bower/materialize/dist';
    public $js = [
        'js/materialize.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'wii\materializee\MaterializeAsset',
    ];
}
