<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'Eu1JeqvoYjMu-YGOzFBYSePVLAA74YQg',
        ],
        'cache' => [
		'class' => 'yii\caching\FileCache',
		'keyPrefix' => 'mml', // a unique cache key prefix
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
//            'class' => \yii\symfonymailer\Mailer::class,
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
            'useFileTransport' => false,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
<<<<<<< HEAD
                    'levels' => ['error', 'warning','info'],
                     'logVars' => ['_SERVER.REQUEST_URI'],
                    'logFile' => '@runtime/logs/app-'.date('Ymd').'.log',
=======
		    'levels' => ['error', 'warning'],
		    'logVars' => ['_SERVER.REQUEST_URI'],
          	    'logFile' => '@runtime/logs/app-'.date('Ymd').'.log',
>>>>>>> 7421707175db5807136f6a8c9ff5f34c4397706e
                ],
            ],
        ],
        'user' => [
            'identityClass' => 'app\modules\auth\models\SignupForm',
            'enableAutoLogin' => true, // if you want cookie-based login
        ],
         
        'db' => $db,
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'auth/index' => 'auth/auth/index',
                'auth/signup' => 'auth/auth/sign-up',
                'auth/login' => 'auth/auth/login',
            ],
        ],
        
    ],
     'modules' => [
         'auth' => [
            'class' => 'app\modules\auth\Auth',
//            'enableAutoLogin' => true,
         ],
         
     ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;