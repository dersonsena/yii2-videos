<?php

namespace app\modules\financeiro\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionCreate()
    {
        return $this->render('create');
    }
}