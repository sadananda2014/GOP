<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
Yii::setPathOfAlias('yiiwheels', dirname(__FILE__).'/../extensions/yiiwheels');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
  'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
  'name'=>'My Web Application',

  // preloading 'log' component
  'preload'=>array('log'),

  // autoloading model and component classes
  'import'=>array(
    'application.models.*',
    'application.components.*',
    'application.modules.user.*',
    'application.modules.user.models.*',
    'application.modules.user.components.*',
  ),

  'modules'=>array(
    
    'user'=>array(
            # encrypting method (php hash function)
            'hash' => 'md5',
 
            # send activation email
            'sendActivationMail' => true,
 
            # allow access for non-activated users
            'loginNotActiv' => false,
 
            # activate user on registration (only sendActivationMail = false)
            'activeAfterRegister' => false,
 
            # automatically login from registration
            'autoLogin' => true,
 
            # registration path
            'registrationUrl' => array('/user/registration'),
 
            # recovery password path
            'recoveryUrl' => array('/user/recovery'),
 
            # login form path
            'loginUrl' => array('/user/login'),
 
            # page after login
            'returnUrl' => array('/enquiry/admin'),
 
            # page after logout
            'returnLogoutUrl' => array('/user/login'),
        ),
    // uncomment the following to enable the Gii tool
    
    
    // uncomment the following to enable the Gii tool
    
    'gii'=>array(
      'class'=>'system.gii.GiiModule',
      'password'=>'1234',
       // If removed, Gii defaults to localhost only. Edit carefully to taste.
      'ipFilters' => false   // EDIT TO TASTE
    ),
    
  ),

  // application components
  'components'=>array(
    'user'=>array(
      // enable cookie-based authentication
      'allowAutoLogin'=>true,
      'class' => 'WebUser',
            'loginUrl' => array('/user/login'),
    ),
    // uncomment the following to enable URLs in path-format
    /*
    'urlManager'=>array(
      'urlFormat'=>'path',
      'rules'=>array(
        '<controller:\w+>/<id:\d+>'=>'<controller>/view',
        '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
        '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
      ),
    ),
    */
    'db'=>array(
      'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
    ),
    // uncomment the following to use a MySQL database
    
    'db'=>array(
      'connectionString' => 'mysql:host=localhost;dbname=roots_sports',
      'emulatePrepare' => true,
      'username' => 'vediclabsvl',
      'password' => 'admin4890',
      'charset' => 'utf8',
      'tablePrefix' => 'tbl_',
    ),
    
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
        /*
        array(
          'class'=>'CWebLogRoute',
        ),
        */
      ),
    ),
  ),

  // application-level parameters that can be accessed
  // using Yii::app()->params['paramName']
  'params'=>array(
    // this is used in contact page
    'adminEmail'=>'sadanand@vediclabs.com',
  ),
);