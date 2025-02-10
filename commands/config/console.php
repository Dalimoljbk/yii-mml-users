<?php
return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'app\commands', // This points to the commands folder
    'bootstrap' => ['log'],
    'components' => [
        'log' => [
            'targets' => [
                [
                    'traceLevel' => YII_DEBUG ? 3 : 0,
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning', 'info'],
                    'logVars' => [],
                    'logFile' => '@runtime/logs/email.log',
                    
                ],
            ],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false, // Set to true for testing (saves emails as files)
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'email-smtp.us-west-2.amazonaws.com',
                'username' => 'AKIAXZ2CHOT75B53GBNN',
                'password' => 'BHw8IFHZsCr+5IKgXP04oDhU2P846oQSVcWY5IgllILj',
                'port' => '587',
                'encryption' => 'tls'
                
            ],
        ],
    ],
    'params' => require __DIR__ . '/params.php',
];
