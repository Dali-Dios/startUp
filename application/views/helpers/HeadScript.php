<?php

class My_View_Helper_HeadScript extends Zend_View_Helper_HeadScript
{
	protected $_captureOnLoadType='jquerymin';
	
	public function captureOnLoadStart($type='jquerymin')
	{
		echo "qwertyuioplkjhgfdds";
                $this->_captureOnLoadType=$type;
		$this->captureStart();
		switch ($this->_captureOnLoadType)
		{
			case 'jquerymin':
				echo 'window.addEvent(\'domready\',function(){';
				break;
			case 'native':default:
				echo 'window.onload=function(){';
				break;
		}
                
	}
	
	public function captureOnLoadEnd()
	{
		switch ($this->_captureOnLoadType)
		{
			case 'jquerymin':case 'native':default:
				echo '}';
				break;
		}
		$this->captureEnd();
	}
}