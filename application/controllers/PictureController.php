<?php

class PictureController extends Zend_Controller_Action
{
    public function indexAction(){
			header('Content-Type: image/png');
			$this->_config=Zend_Registry::get('config');
			$filename = APPLICATION_PATH."/../www/data/user8/1.jpg";
			$pic = file_get_contents($filename);
			echo $pic;
			die ();
    }
}

?>