<?php
/**
 * Created by IntelliJ IDEA.
 * User: wotan
 * Date: Feb 18, 2010
 * Time: 2:23:54 PM
 * To change this template use File | Settings | File Templates.
 */

class My_Plugin_Acl extends Zend_Controller_Plugin_Abstract {
  private $_acl = null;

  public function __construct(Zend_Acl $acl) {
    $this->_acl = $acl;
  }

  public function preDispatch(Zend_Controller_Request_Abstract $request) {

    $role = (Zend_Auth::getInstance()->hasIdentity())
          ? Zend_Auth::getInstance()->getIdentity()->role
          : 'guest';

    $resource = $request->getControllerName();
    $privilege = $request->getActionName();
    if(!$this->_acl->isAllowed($role, $resource, $privilege)) {
     // if not enough access level redirect to login page, but mb need to another redirect
      $request->setControllerName('index')
              ->setActionName('index');
    }
  }
}
