<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
     public $css = [
        '/web/css/main.css',
        '/web/css/slider.css'
    ];
    public $cssOptions = ['conditon' => 'lte IE8'];
    public $js = [
     '/web/js/functions.js',
     '/web/js/slider.js',
    ];
    public $depends = [
        'app\assets\MyAppAsset',

        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
