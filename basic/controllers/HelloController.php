<?php

namespace app\controllers;

use yii\web\Controller;

class HelloController extends Controller
{
    public function actionSaySomething($message='Hello')
    {
        return $this->render('say-something', [
            'message' => $message
        ]);
    }
}