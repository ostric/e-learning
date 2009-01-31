<?php
// application/controllers/IndexController.php

/**
 * IndexController is the default controller for this application
 * 
 * Notice that we do not have to require 'Zend/Controller/Action.php', this
 * is because our application is using "autoloading" in the bootstrap.
 *
 * @see http://framework.zend.com/manual/en/zend.loader.html#zend.loader.load.autoload
 */
class IndexController extends Zend_Controller_Action 
{
    /**
     * The "index" action is the default action for all controllers. This 
     * will be the landing page of your application.
     *
     * Assuming the default route and default router, this action is dispatched 
     * via the following urls:
     *   /
     *   /index/
     *   /index/index
     *
     * @return void
     */
    public function indexAction() 
    {
        /*
           There is nothing inside this action, but it will still attempt to 
           render a view.  This is because by default, the front controller 
           uses the ViewRenderer action helper to handle auto rendering
           In the MVC grand scheme of things, the ViewRenderer allows us to 
           draw the line between the C and V in the MVC.  Also note this action
           helper is optional, but on default.
        */ 
    }
}
