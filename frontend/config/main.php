<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'user' => [
            'identityClass' => 'frontend\models\User',
            'enableAutoLogin' => true,
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
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
             'rules' => [
                 ['class' => 'yii\rest\UrlRule','controller' => 'room','pluralize' => false],


                 // 配置自定义搜索方法.
                 'GET room/search/<param>' => 'room/search',
             ],
        ],


        // 配置返回json格式数据
     /*   'request' => [
            'class' => 'yii\web\Request',
            'enableCookieValidation' => false,
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],*/
            
        //测试自定义组件
        'mycomponent' => [
            'class' => 'frontend\component\MyComponent',
            'attr' => 'LLF',
        ],

          /*
              // 测试TestRestful组件 
            'TestRestful' => [
                'indentityClass' => 'frontend\models\TestRestful',
                'enableAutoLogin' => true,
            ]
          */
    ],
    'params' => $params,
];
