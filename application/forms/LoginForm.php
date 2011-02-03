<?php
class Form_LoginForm extends Zend_Form
{
	protected $_forward=null;
	
	public function __construct($option=null)
	{
		parent::__construct($option);
		
		$view=$this->getView();
		
		$this->addElement('text','login',array
		(
			'label' => 'Login:',
			'required' => true,
			'class' => 'textinput',
			'decorators' => array
		 	(
		 		'ViewHelper',
		 		array(array('data' => 'HtmlTag'), array('tag' => 'td')), 
		 		array('Label', array('tag' => 'td')),
		 		array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
		 	),
      'filters' => array('StringTrim','StripTags')
		));
		
		$this->addElement('password','password',array
		(
			'label' => 'Password:',
			'required' => true,
			'class' => 'textinput',
			'decorators' => array
		 	(
		 		'ViewHelper',
		 		array(array('data' => 'HtmlTag'), array('tag' => 'td')), 
		 		array('Label', array('tag' => 'td')),
		 		array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
		 	),
      'filters' => array('StringTrim','StripTags')
		));
		
		$recoverUrl=$view->url(array
		(
			'controller' => 'user',
			'action' => 'recoverpassword'
		),'default',true);
		
		
		
		$this->addElement('submit','auth',array
		(
			'label' => 'login',
			'decorators' => array
		 	(
		 		'ViewHelper',
		 		array(array('data' => 'HtmlTag'), array('tag' => 'td','colspan' => '2','class' => 'textCenter')), 
		 		array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
		 	)
		));
		
		if ($this->_forward)
		{
			$this->addElement('hidden','forward',array
			(
				'value' => $this->_forward,
				'decorators' => array
			 	(
			 		'ViewHelper'
			 	)
			));
		}
		
		$this->addElement('hash','hash',array
		(
			'salt' => 'login',
			'decorators' => array
		 	(
		 		'ViewHelper'
		 	)
		));
					 	
		$this->setName('frmLogin')
				 ->setAttrib('id','frmLogin')
				 ->setAction('/user/login')
				 ->setMethod('post');

	}
	
	function loadDefaultDecorators()
	{
		$this->setDecorators(array
		(
			'FormElements', 
			array('HtmlTag',array('tag' => 'table','cellspacing' => '24','style' => 'margin: 0 auto;')), 
			'Form'
		));
	}
	
	function setForward($forwardUrl)
	{
		$this->_forward=(string)$forwardUrl;
		return $this;
	}
}
