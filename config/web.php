<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language'=>'vi',
    'timeZone' => 'Asia/Ho_Chi_Minh',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\admin',
        ],
        'gridview' => [ 'class' => '\kartik\grid\Module' ],
    	'user-management' => [
    				'class' => 'webvimark\modules\UserManagement\UserManagementModule',

    				'enableRegistration' => true,

    				// Add regexp validation to passwords. Default pattern does not restrict user and can enter any set of characters.
    				// The example below allows user to enter :
    				// any set of characters
    				// (?=\S{8,}): of at least length 8
    				// (?=\S*[a-z]): containing at least one lowercase letter
    				// (?=\S*[A-Z]): and at least one uppercase letter
    				// (?=\S*[\d]): and at least one number
    				// $: anchored to the end of the string

    				//'passwordRegexp' => '^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$',


    				// Here you can set your handler to change layout for any controller or action
    				// Tip: you can use this event in any module
    				'on beforeAction'=>function(yii\base\ActionEvent $event) {
    				if ( $event->action->uniqueId == 'user-management/auth/login' )
    				{
    					$event->action->controller->layout = '/loginLayout.php';
    				};
    				},
    				// 'controllerNamespace'=>'vendor\webvimark\modules\UserManagement\controllers', // To prevent yii help from crashing
    	],
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'e_RTifKS9CkE_JdZCJFI50Dev_D8dADJ',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    	'view'=> [
    		'theme' => [
    			'class' => 'yii\base\Theme',
    			'basePath' => '@app/themes/main',
    			'baseUrl' => '@web/themes/main',
    			'pathMap' => ['@app/views' => '@app/themes/main'],
    		],
    	],
    	'user' => [
			'class' => 'webvimark\modules\UserManagement\components\UserConfig',

			// Comment this if you don't want to record user logins
			'on afterLogin' => function($event) {
			     \webvimark\modules\UserManagement\models\UserVisitLog::newVisitor($event->identity->id);
			}
    	],
        'errorHandler' => [
            'errorAction' => 'site/error',
        	//'class' => 'Amirax\SeoTools\Redirect',
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

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
               
            	'/'=>'site/index',
                '/not-found' => 'site/not-found',
                'admin' => 'admin/default',
                'blog' => 'site/posts',
                'post/<slug>' => 'site/post',
                'page/<slug>' => 'site/page',
                'cat/<slug>' => 'site/cat',
                'tag/<slug>' => 'site/tag',
                'product-cat/<slug>' => 'site/products',
                'product/<slug>' => 'site/product',
                
                
            ],
        ],

        'userCounter' => [
            'class' => 'app\components\UserCounter',
            // You can setup these options:
            'tableUsers' => 'pcounter_users',
            'tableSave' => 'pcounter_save',
            'autoInstallTables' => true,
            'onlineTime' => 10, // min
        ],
        /* 'seo' => [
        		'class' => 'Amirax\SeoTools\Meta'
        ] */

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
   /* $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];*/

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
