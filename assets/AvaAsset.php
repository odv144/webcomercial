<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;
/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AvaAsset extends AssetBundle
{
   // public $basePath = '@webroot';
    //public $baseUrl = '@app/themes/elegante/';
    public $sourcePath = '@app/themes/avanzado/';
    public $css = [
      '@app/themes/avanzado/vendor/bootstrap/css/bootstrap.min.css',
      '@app/themes/avanzado/vendor/metisMenu/metisMenu.min.css',
      '@app/themes/avanzado/dist/css/sb-admin-2.css',
      '@app/themes/avanzado/vendor/morrisjs/morris.css',
      '@app/themes/avanzado/vendor/font-awesome/css/font-awesome.min.css',
    ];
    public $js = [
        '@app/themes/avanzado/vendor/jquery/jquery.min.js',
        '@app/themes/avanzado/vendor/bootstrap/js/bootstrap.min.js',
        '@app/themes/avanzado/vendor/metisMenu/metisMenu.min.js',
        '@app/themes/avanzado/vendor/raphael/raphael.min.js',
        '@app/themes/avanzado/vendor/morrisjs/morris.min.js',
        '@app/themes/avanzado/data/morris-data.js',
        '@app/themes/avanzado/dist/js/sb-admin-2.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
