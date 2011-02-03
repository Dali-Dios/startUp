<?php
class Form_RegistrationForm extends Zend_Form
{
	
	public function __construct($option=null)
	{
		parent::__construct($option);
		
		$view=$this->getView();
		$staticDate = new Model_StaticData();

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
      'filters' => array('StringTrim','StripTags'),
			'validators' => array
		 	(
		 		array('StringLength', true, array(0, 50)),	 		
		 		array('Db_NoRecordExists', true, array('table' => 'users','field' => 'login'))
		 	)
		));

		$this->addElement('text','email',array
		(
			'label' => 'Email:',
			'required' => true,
			'class' => 'textinput',
			'decorators' => array
		 	(
		 		'ViewHelper',
				'Errors',
		 		array(array('data' => 'HtmlTag'), array('tag' => 'td')),
		 		array('Label', array('tag' => 'td')),
		 		array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
		 	),
      'filters' => array('StringTrim','StripTags'),
			'validators' => array
		 	(
		 		array('StringLength', true, array(0, 50)),
		 		array('EmailAddress'),
		 		array('Db_NoRecordExists', true, array('table' => 'users','field' => 'email'))
		 	),
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

		$this->addElement('select', 'gender', array(
			'MultiOptions' => $staticDate->getGenderList(),
			'label' => 'Gender',
			'decorators' => array
		 	(
		 		'ViewHelper',
		 		array(array('data' => 'HtmlTag'), array('tag' => 'td')),
		 		array('Label', array('tag' => 'td')),
		 		array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
		 	)


		));
		
		
		$this->addElement('submit','Registration',array
		(
			'label' => 'Registration',
			'decorators' => array
		 	(
		 		'ViewHelper',
		 		array(array('data' => 'HtmlTag'), array('tag' => 'td','colspan' => '2','class' => 'textCenter')), 
		 		array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
		 	)
		));

		
		
		$this->addElement('hash','hash',array
		(
			'salt' => 'login',
			'decorators' => array
		 	(
		 		'ViewHelper'
		 	)
		));
					 	
		$this->setName('frmRegistration')
				 ->setAttrib('id','frmRegistration')
				 ->setAction('/user/registration')
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
	
}
