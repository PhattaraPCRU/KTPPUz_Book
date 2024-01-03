<?php
use \yii\web\Request;
$baseUrl = str_replace('/frontend/web', '', (new Request)->getBaseUrl());
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        // 'view' => [
		// 	'theme' => [
		// 		'pathMap' => [
		// 			'@frontend/views' => '@frontend/views/adminlte3'
		// 		],
		// 	],
		// ],
        'request' => [
            'baseUrl' => $baseUrl,
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'showScriptName' => false,   // Disable index.php
            'enablePrettyUrl' => true,   // Disable r= routes
            'enableStrictParsing' => false,
            'rules' => [
            	'' => 'site/index',
            ]
        ],
    ],
    'params' => $params,
    'modules'=>[
        'dynagrid'=> [
             'class'=>'\kartik\dynagrid\Module',
             // other module settings
         ],
         'gridview'=> [
             'class'=>'\kartik\grid\Module',
             // other module settings
         ],
         'cookieSettings' => ['httpOnly' => true, 'expire' => time() + 8640000]
     ]
];
