<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class ArgonAsset extends AssetBundle
{
    public $basePath = '@webroot/argon';
    public $baseUrl = '@web/argon';
    public $css = [
        'assets/css/nucleo-icons.css',
        'assets/css/nucleo-svg.css',
        'assets/css/nucleo-svg.css',
        'assets/css/argon-dashboard.css?v=2.0.4'
    ];
    public $js = [
        'assets/js/core/popper.min.js',
        'assets/js/core/bootstrap.min.js',
        'assets/js/plugins/perfect-scrollbar.min.js',
        'assets/js/plugins/smooth-scrollbar.min.js',
        // 'assets/js/plugins/chartjs.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
