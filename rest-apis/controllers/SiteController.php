<?php

namespace app\controllers;

use RestClient;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionFeed()
    {
        $api = new RestClient([
            'base_url' => "http://localhost:9999/api",
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);

        /*$result = $api->get('/default');
        echo '<pre>'; print_r($result->response); die;*/

        /*$api->post('default/create', [
            'titulo' => 'Criando notícia pela Aplicação',
            'cabeca' => 'Cabeça do titulo',
            'corpo' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis varius velit eu risus hendrerit commodo. Suspendisse potenti. Sed tempus vitae erat id dapibus. ',
            'status' => 1
        ]);*/

        /*$api->put('default/4', [
            'titulo' => 'Alterando o titulo do ID 4'
        ]);*/

        //$api->delete('default/4');

        return $this->render('feed');
    }
}
