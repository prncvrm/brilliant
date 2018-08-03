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
 * @author Prince Verma <prncvrm@gmail.com>
 * @since 2.0
 * @version 1.0
 */

class PluginsAsset extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/plugins';
    public $js = [
        'datepicker/js/bootstrap-datepicker.js',
        'timepicker/bootstrap-timepicker.js',
        'datatable/datatables.min.js',
        'bootstrap-slider/bootstrap-slider.js',
        'select/select.min.js',

        // more plugin Js here
    ];
    public $css = [
        'datepicker/css/bootstrap-datepicker.css',
        'timepicker/bootstrap-timepicker.css',
        'datatable/datatables.min.css',
        'Ionicons/css/ionicons.min.css',
        'bootstrap-slider/slider.css',
        'select/select.min.css',
        // more plugin CSS here
    ];
    public $depends = [
        'dmstr\web\AdminLteAsset',
    ];
}