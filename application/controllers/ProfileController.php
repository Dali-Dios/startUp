<?php

class ProfileController extends Zend_Controller_Action
{
    public function indexAction(){
        echo "OLOLOLOLOLOLO";
				$userId=Zend_Auth::getInstance()->getIdentity()->id;
				$picGenerateName = md5(time());
				$picGenerateName = (str_split($picGenerateName, 10));
				echo " - - - - - <br/>".$picGenerateName[0];
				$form = new Form_UploadForm(array('picture'=>$picGenerateName[0].'.jpg'));
				$this->view->form = $form;

				if($this->getRequest()->isPost()) {
            if($form->isValid($_POST)) {
							$data = $form->getValue('picture');

							$sqlData = array (
									'name' => $picGenerateName[0].'.jpg',
									'user_id' => $userId,
									'publ' => 1,
									'category_id' => '1'
							);

							


							$pictureModel = new Model_Picture();
							$pictureModel->insert($sqlData);

							Zend_Debug::dump($_FILES);
							/*echo $tmp_name = $_FILES["picture"]["tmp_name"];
							$config=Zend_Registry::get('config');
							//echo "---- ".$config->thumbnail->picture->width;
							echo APPLICATION_PATH."www/images/";
							$new_image_name = 'atatata.jpg';
							$upload = new Zend_File_Transfer();
							$upload->addFilter('Rename', APPLICATION_PATH."/../www/images/");

							$picture=$form->getElement('picture');
							//$adapter=$picture->getTransferAdapter();
							//$adapter->addFilter('Rename', 'test123.jpg');
							//$picture->receive();
							//if ($picture->receive())
							//{
								
							//}
							*/

						}
				}
    }

		public function albumsAction (){
			
		}

		public function uploadAction (){
			$userId=Zend_Auth::getInstance()->getIdentity()->id;
			$picGenerateName = md5(time());
			$picGenerateName = (str_split($picGenerateName, 10));

			$form = new Form_UploadForm(array('picture'=>$picGenerateName[0].'.jpg'));
			$this->view->form = $form;

			if($this->getRequest()->isPost()) {
					if($form->isValid($_POST)) {
						$data = $form->getValue('picture');
						$sqlData = array (
								'name' => $picGenerateName[0].'.jpg',
								'user_id' => $userId,
								'publ' => 1,
								'category_id' => '1'
						);
						$pictureModel = new Model_Picture();
						$pictureModel->insert($sqlData);
					}
				$this->_redirect('/profile/index');
			}
			
		}



   
}

?>