<?php
class Plugin_FlashMessages extends Zend_Controller_Plugin_Abstract
{
	const HIGH_PRIORITET = 'HIGH_PRIORITET:';
	const SHIFT = 15;

	public function postDispatch(Zend_Controller_Request_Abstract $request)
	{
		$layout=Zend_Layout::getMvcInstance();
		$view=$layout->getView();
		$flashMessenger = Zend_Controller_Action_HelperBroker::getStaticHelper('flashMessenger');

		$flashMessages=$flashMessenger->getMessages();
		

		if (!empty($flashMessages))
		{
			echo "aaaaaaaaaaaaaaaaaaaa";
		}
	}
}
