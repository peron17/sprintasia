<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'SprintAsia',
	'theme'=>'my',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'generatorPaths' => array('ext.giiextended'),
			'password'=>'123',
			'ipFilters'=>array('127.0.0.1','::1'),
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
		),
	),

	// application components
	'components'=>array(

		'clientScript'=>array(
			'packages'=>array(
            	'jquery'=>array(
                	'baseUrl'=> '/sprintasia/themes/my/js/',
                    'js'=>array('jquery-3.3.1.slim.min.js')
                ),
            ) 
		),

		'request'=>array(
			'enableCookieValidation' => true,
			'enableCsrfValidation'   => false,
       	),

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin' => true,
			'loginUrl'       => array('site/login'),
		),

		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName' => false,
			'caseSensitive'  => false,
			// 'appendParams'=>true,
			// 'class' => 'UrlManager',
			'rules'=>array(
				'<controller:\w+>/view/id/<id:\w+>'      => '<controller>/view',
				'<controller:\w+>/update/id/<id:\w+>'    => '<controller>/update',
				'<controller:\w+>/delete/id/<id:\w+>'    => '<controller>/delete',
				'<controller:\w+>/edit/id/<id:\w+>'    => '<controller>/edit',
				
				'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
				'<controller:\w+>/<action:\w+>'          => '<controller>/<action>',

				// '<controller:[\w\-]+>/<action:[\w\-]+>' => '<controller>/<action>',
			),
		),

		

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),
		
		// live
		// 'db'=>array(
		// 	'class'              => 'application.extensions.PHPPDO.CPdoDbConnection',
		// 	'pdoClass'           => 'PHPPDO',
		// 	'connectionString'   => 'mssql:host=10.210.70.77;dbname=GMS',
		// 	'emulatePrepare'     => true,
		// 	'username'           => 'sa',
		// 	'password'           => 'Terimakasih2014',
		// 	'charset'            => 'utf8',
		// ),

		// 'authManager' 		=> array(
		// 	'class' 		=> 'CDbAuthManager',
		// 	'connectionID' 	=> 'db',
		// ),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				
				// array(
				// 	'class'=>'CWebLogRoute',
				// ),
				
			),
		),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);
