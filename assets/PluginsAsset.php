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
        'timepicker/bootstrap-timepicker.min.js',
        'datatable/datatables.min.js',

        // more plugin Js here
    ];
    public $css = [
        'datepicker/css/bootstrap-datepicker.css',
        'timepicker/bootstrap-timepicker.min.css',
        'datatable/datatables.min.css',
        'Ionicons/css/ionicons.min.css',
        // more plugin CSS here
    ];
    public $depends = [
        'dmstr\web\AdminLteAsset',
    ];
}