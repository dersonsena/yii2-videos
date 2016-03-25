<?php

namespace app\controllers;

use yii\web\Controller;

class AssetsController extends Controller
{
    public $layout = 'blank';

    public function actionIndex()
    {
        return $this->render('index', []);
    }
}