<?php

require dirname(dirname(__FILE__)) . '/application/config/global.php';
$cli = new Doctrine_Cli(Zend_Registry::get('doctrine_config'));
$cli->run($_SERVER['argv']);

print "\n";
