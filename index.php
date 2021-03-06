<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../../yii-1.1.7.r3135/framework/yii.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

if( ! YII_DEBUG )
{
    $config=dirname(__FILE__).'/protected/config/production.config.php';
}
else
{
    error_reporting(E_ALL); 
    ini_set("display_errors", 1);
    $config=dirname(__FILE__).'/protected/config/development.config.php';
}

require_once($yii);
Yii::createWebApplication($config)->run();
