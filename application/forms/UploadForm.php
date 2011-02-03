<?php
class Form_UploadForm extends Zend_Form
{
	protected $_picture = null;
	protected $_config = null;

	public function __construct($option=null)
	{
		parent::__construct($option);
		//print_r (Zend_Registry::get('config'));
		
		$this->_config=Zend_Registry::get('config');
		$userId=Zend_Auth::getInstance()->getIdentity()->id;
		$this->_config->production->path->userFolder;
		
		$this->addElement('file','picture',array
		(
			'label' => 'Picture',
			'class' => 'textinput',
			'Destination' => sprintf($this->_config->production->path->userFolder,8),
			
			'decorators' => array
		 	(
		 		'File',
		 		'Errors',
		 		array(array('wrapper' => 'htmlTag'), array('tag' => 'div','class' => 'inputFile')),		 		
		 		array(array('data' => 'HtmlTag'), array('tag' => 'td','rowspan' => 10,'class' => 'vTop textCenter pictureUpload')),
		 	),
		 	'validators' => array
		 	(
		 		array('Count', false, 1),
		 		array('Size',false,array('max' => '5MB','bytestring' => false)),
		 		array('Extension', false, 'jpg,png,gif')
		 	),
			'filters' => array
				(
					'Rename'=>  $this->_picture
				)
		));

		$this->addElement('submit','uploadb',array
		(
			'label' => 'загрузить',
			'decorators' => array
		 	(
		 		'ViewHelper',
		 		array(array('data' => 'HtmlTag'), array('tag' => 'td','colspan' => '2','class' => 'textCenter')),
		 		array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
		 	)
		));



	}

	
	public function setPicture($pictureName){
		//$pictureName = 'Test.jpg';
		$this->_picture = $pictureName;
		return $this;
	}

	/*public function setUserId($userId){
		$this->_userId = $userId;
		return $this;
	}
	 * 
	 */
	 
	


}

?>
