<?php

namespace app\assets\meusAssets;

use yii\web\AssetBundle;

class SegundaAsset extends AssetBundle
{
    public $sourcePath = '@app/assets/meusAssets/files';

    public $css = [
        'estilo-1.css',
        'estilo-2.css',
    ];

    public $js = [
        'logica.js',
        'ui.js',
        'models.js',
    ];

    public $depends = [
        'app\assets\meusAssets\PrimeiroAsset'
    ];
}