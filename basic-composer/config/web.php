<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'name' => 'Minha Aplicação',
    'version' => '2.5',
    'aliases' => [
        '@meualias1' => 'path/to/meu/alias1',
    ],
    'language' => 'pt_BR',
    'sourceLanguage' => 'pt-BR',
    'timeZone' => 'America/Fortaleza',
    'charset' => 'UTF-8',
    /*'catchAll' => [
        'pessoas/index'
    ],*/
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'RpgtVoGkx6SYYp3TOl-np5LVR9nrKKHz',
        ],
        'myComponent' => [
            'class' => 'app\classes\components\MyComponent',
            'string' => 'Yii2 Vídeos'
        ],
        'formatter' => [
            'class' => 'app\classes\components\MyFormatter',
            'dateFormat' => 'dd/MM/YYYY'
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
    ],
    'modules' => [
        'financeiro' => [
            'class' => 'app\modules\financeiro\FinanceiroModule'
        ]
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1', '192.168.0.*']
    ];
}

return $config;
