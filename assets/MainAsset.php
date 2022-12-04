<?php

namespace app\assets;

use yii\web\AssetBundle;

class MainAsset extends AssetBundle
{
    public $basePath = '@webroot';

    public $css = [
        'css/style.min.css',
    ];

    public $js = [
        'js/main.js'
    ];
}