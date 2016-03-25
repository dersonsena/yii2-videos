<?php

namespace app\assets\meusAssets;

use yii\web\AssetBundle;

class PrimeiroAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/assets.css'
    ];

    public $js = [
        'js/assets.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'app\assets\meusAssets\OpenSansAsset'
    ];
}