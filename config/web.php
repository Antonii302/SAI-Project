<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'S.A.I_Project',
    'timeZone' => 'America/El_Salvador',
    'language' => 'es',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => [
        'backup' => [
            'class' => 'floor12\backup\Module',
            'backupFolder' => '@app/backups',
            'administratorRoleName' => '@',
            'configs' => [
                'mysql_db' => [
                    'type' => 'Database',
                    'title' => 'Mysql database',
                    'connection' => 'db',
                    'limit' => 0
                ]
            ]
        ],
        'gridview' =>  [
             'class' => '\kartik\grid\Module'
        ],
        'warehouse' => [
            'class' => 'app\modules\warehouse\Warehouse',
        ],
        'general-details' => [
            'class' => 'app\modules\general_details\GeneralDetails',
        ],
        'general-processes' => [
            'class' => 'app\modules\general_processes\GeneralProcesses',
        ],
    ],
    'components' => [
        'request' => [
            'cookieValidationKey' => 'EBr_AS9-3RvV6Tmu9w5nflzLO5Q7ItRr',
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
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
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
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
