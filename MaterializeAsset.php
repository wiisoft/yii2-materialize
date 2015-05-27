<?php
namespace wii\materializee;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Materialize css files.
 *
 * @author wiisoft <webdev@webmaker.today>
 * @since 1.0
 */
class MaterializeAsset extends AssetBundle
{
    public $sourcePath = '@bower/materialize/dist';
    public $css = [
        'css/materialize.css',
    ];
}



