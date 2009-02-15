<?php

// set ROOT Aplication PATH
define('ROOT', dirname(dirname(dirname(__FILE__))));
// set Aplication PATH
define('APPLICATION_PATH', ROOT . '/application');
// set Config path
define('CONFIG_PATH', APPLICATION_PATH . '/config');
// 
set_include_path(ROOT . '/library'
                . PATH_SEPARATOR . ROOT . '/library/Doctrine' 
                . PATH_SEPARATOR . get_include_path());


require_once 'Zend/Loader.php';
// automatic load when Object called
Zend_Loader::registerAutoload();
// load application config ini
$appconfig = new Zend_Config_Ini(CONFIG_PATH
        . '/config.ini', 'application');
        
// set application environment
define('APPLICATION_ENVIRONMENT',$appconfig->environment);
// set zend modules path 
define('MODULES_PATH', ROOT . $appconfig->path->modules);

define('LAYOUT_PATH', ROOT . $appconfig->path->layout);

// database config ini 
$dbconfig = new Zend_Config_Ini(CONFIG_PATH 
                    . '/database.ini', APPLICATION_ENVIRONMENT);
// dns set      

Doctrine_Manager::connection($dbconfig->database->rdbms .'://'
                        . $dbconfig->database->user .':' 
                        . $dbconfig->database->password .'@'
                        . $dbconfig->database->host . '/'
                        . $dbconfig->database->name);

// doctrine config
$drconfig = new Zend_Config_Ini(CONFIG_PATH . '/config.ini', 'doctrine');
/*
define('MODELS_PATH',ROOT. $drconfig->path->models);
Doctrine_Manager::getInstance()->setAttribute(Doctrine::ATTR_MODEL_LOADING, 
                                    Doctrine::MODEL_LOADING_CONSERVATIVE);

Doctrine::loadModels(MODELS_PATH);
*/
set_include_path(ROOT . $drconfig->path->models
                . PATH_SEPARATOR . ROOT . $drconfig->path->models . '/generated'
                . PATH_SEPARATOR . get_include_path());

// registry doctrine path
Zend_Registry::set('doctrine_config', array(
                'data_fixtures_path'  =>  ROOT . $drconfig->path->fixtures,
                'models_path'         =>  ROOT . $drconfig->path->models,
                'migrations_path'     =>  ROOT . $drconfig->path->migrations,
                'sql_path'            =>  ROOT . $drconfig->path->sql,
                'yaml_schema_path'    =>  ROOT . $drconfig->path->schema));

// unset all object setting
unset($appconfig,$dbconfig,$drconfig);
