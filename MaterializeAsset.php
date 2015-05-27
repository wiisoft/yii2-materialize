<?php
namespace wii\materialize;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Materialize css files.
 *
 * @author wiisoft <webdev@webmaker.today>
 * @since 1.0
 */
class MaterializeAsset extends AssetBundle
{
    public $sourcePath = '@bower/maza';
    public $css = [
        'css/materialize-fix-min.css',
    ];
}



