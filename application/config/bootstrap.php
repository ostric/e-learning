<?php
require 'global.php';

$frontController = Zend_Controller_Front::getInstance();
$frontController->setParam('env',APPLICATION_ENVIRONMENT);
$frontController->addModuleDirectory(MODULES_PATH);

Zend_Layout::startMvc(LAYOUT_PATH);

$view = Zend_Layout::getMvcInstance()->getView();
$view->doctype('XHTML1_STRICT');
$view->nama = "Ata";

unset($frontController,$view);

Zend_Controller_Front::getInstance()->dispatch();
