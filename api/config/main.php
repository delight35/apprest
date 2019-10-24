<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'api\controllers',
    'modules' => [        
        'v1' => [
            'class' => 'api\modules\v1\Module',
        ]
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            // Необязательно. Без нее, API сможет определить только форматы:
            // application/x-www-form-urlencoded и multipart/form-data
            'parsers' => [
                'application/json' => 'yii\web\JsonParser'
            ]
        ],
        'response' => [
            'class' => 'yii\web\Response',
            'format' => 'json',
            'on beforeSend' => function ($event) {
                $response = $event->sender;
                //if ($response->data !== null && !empty(Yii::$app->request->get('suppress_response_code'))) {\
                if ($response->isSuccessful) {
                    $response->data = [
                        'status' => 'Success',
                        'message' => 'Успешно',
                        'data' => $response->data,
                    ];
                    $response->statusCode = 200;
                } else {
                    $response->data = [
                        'status' => 'GeneralInternalError',
                        'message' => 'Произошла ошибка',
                        'data' => [],
                    ];                    
                    $response->statusCode = 500;
                }
            },
        ],        
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-api', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the api
            'name' => 'advanced-api',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            //'class' => 'yii\web\UrlManager',
            //'enableStrictParsing' => true,
            'enablePrettyUrl' => true,            
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => ['/v1/post' => 'v1/post'],
                     // Запретить методы:
                    'except' => ['create', 'update', 'delete', 'options'],
                    // 'pluralize' => false, // TODO : не работает
                ]
            ],
        ],
        
    ],
    'params' => $params,
];
