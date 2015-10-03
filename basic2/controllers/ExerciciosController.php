<?php

namespace app\controllers;

use Yii;
use app\models\Pessoas;
use app\models\CadastroModel;
use yii\base\Controller;
use yii\data\Pagination;

class ExerciciosController extends Controller
{
    public function actionFormulario()
    {
        $cadastroModel = new CadastroModel;
        $post = Yii::$app->request->post();

        if($cadastroModel->load($post) && $cadastroModel->validate()) {

            return $this->render('formulario-confirmacao', [
                'model' => $cadastroModel
            ]);

        } else {

            return $this->render('formulario', [
                'model' => $cadastroModel
            ]);

        }

    }

    public function actionPessoas()
    {
        $query = Pessoas::find();

        $pagination = new Pagination([
            'defaultPageSize' => 3,
            'totalCount' => $query->count()
        ]);

        $pessoas = $query->orderBy('nome')
                         ->offset($pagination->offset)
                         ->limit($pagination->limit)
                         ->all();

        return $this->render('pessoas', [
            'pessoas' => $pessoas,
            'pagination' => $pagination
        ]);
    }
}