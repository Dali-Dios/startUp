<?php

class IndexController extends Zend_Controller_Action
{
    public function indexAction(){
        echo "OLOLOLOLOLOLO".Zend_Auth::getInstance()->getIdentity()->id;
				$this->_helper->FlashMessenger(
																				array('error'=>'Sorry, could not complete your request.')
																			);
				//print_r ($_SESSION);

				/*$acl = new Zend_Acl();


				$acl->addRole(new Zend_Acl_Role('guest'))
						->addRole(new Zend_Acl_Role('member'))
						->addRole(new Zend_Acl_Role('admin'));

				$acl->addResource(new Zend_Acl_Resource('index'))
								->deny('guest','index', 'index');
				 * 
				 */
    }
}

?>