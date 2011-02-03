<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	protected function _initAutoload()
	{
		$modelLoader=new Zend_Application_Module_Autoloader(array
		(
			'namespace' => '', 
			'basePath' => APPLICATION_PATH
		));
		
		return $modelLoader;
	}

	protected function _initNavigation()
	{
		$navigation=new Zend_Navigation(new Zend_Config(require APPLICATION_PATH . DIRECTORY_SEPARATOR.'configs'.DIRECTORY_SEPARATOR.'navigation.php'));
		Zend_Registry::set('Zend_Navigation',$navigation);
	}

	
	
	protected function _initPlugings()
	{
		$frontController = Zend_Controller_Front::getInstance();
		$acl = new My_Acl();
		$frontController->registerPlugin(new My_Plugin_Acl($acl));
		/*$roles=My_Acl::GUEST;
		if (Zend_Auth::getInstance()->hasIdentity())
		{
			$roles=Zend_Auth::getInstance()->getIdentity()->roles;
		}
		Zend_Registry::set('roles',new My_Acl_Role_Container($roles));
		
		$fc=Zend_Controller_Front::getInstance();
		
		$fc->registerPlugin(new Plugin_AccessCheck());
		$fc->registerPlugin(new Plugin_FlashMessages());
                 * 
                 */

		$fc=Zend_Controller_Front::getInstance();		
		$fc->registerPlugin(new Plugin_FlashMessages());
	}
	
	protected function _initHelpers()
	{
	}
	
	protected function _initJQueryContainer()
	{		   
      //$view = new Zend_View();
			$this->bootstrap('view');
			$view = $this->getResource('view');
      $view->addHelperPath('ZendX/JQuery/View/Helper/', 'ZendX_JQuery_View_Helper');   
      $viewRenderer = new Zend_Controller_Action_Helper_ViewRenderer();   
      $viewRenderer->setView($view);   
      Zend_Controller_Action_HelperBroker::addHelper($viewRenderer);
	}
	
	protected function _initHead()
	{
		/*$this->bootstrap('view');
		$view = $this->getResource('view');
		$view->doctype('XHTML11');
		$view->headMeta()->appendHttpEquiv('Content-type','text/html;charset='.$view->getEncoding());
		
		$view->headTitle()->setSeparator(' | ');
		$view->headTitle()->headTitle($view->translate('Photo'),'PREPEND');
		*/
		//$view->headScript()->add('config');
		
		
		
		//$view->render('onLoadFucntions.phtml');
		
		
	}
	
	protected function _initConfig()
	{
		$config=new Zend_Config_Ini(APPLICATION_PATH . '/configs/application.ini');
		Zend_Registry::set('config',$config);
	}

	protected function _initDefaultSettings()
	{
		/*Zend_View_Helper_Navigation_HelperAbstract::setDefaultAcl(My_Acl::getInstance());
		Zend_View_Helper_Navigation_HelperAbstract::setDefaultRole(Zend_Registry::get('roles'));
		
		Zend_Paginator::setDefaultScrollingStyle('Sliding');
		Zend_View_Helper_PaginationControl::setDefaultViewPartial('frontPagination.phtml');
                 * 
                 */
	}
}

