<?php

class UserController extends Zend_Controller_Action
{
    public function indexAction(){
        echo "OLOLOLOLOLOLO";
    }

    public function loginAction(){
        //print_r(Zend_Db_Table::getDefaultAdapter());
				//die ();

        $loginForm = new Form_LoginForm();
        $this->view->loginForm = $loginForm;

        if($this->getRequest()->isPost()) {
            if($loginForm->isValid($_POST)) {
                $data = $loginForm->getValues();

								$authAdapter=$this->_getAuthAdapter();
                
                $authAdapter->setTableName('users');
                $authAdapter->setIdentityColumn('login');
                $authAdapter->setCredentialColumn('password');

                $authAdapter->setIdentity($data['login']);
                $authAdapter->setCredential($data['password']);

                $auth = Zend_Auth::getInstance();
                $result = $auth->authenticate($authAdapter);

								if ($result->isValid()) {
                    // success: store database row to auth's storage
                    // system. (Not the password though!)
                    $data = $authAdapter->getResultRowObject(null, 'password');
                    $auth->getStorage()->write($data);
                    $this->_redirect('/');
                } else {
                    // failure: clear database row from session
                    $err_msg = array('Login failed.');
                    $this->view->err_msg = $err_msg;
										$this->_redirect('/user/login');
                    //$this->renderScript('login/index.phtml');
                }
            }
        }
				print_r ($_SESSION);
    }

		protected function _getAuthAdapter()
		{
			$authAdapter=new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter(),'users','login','password','MD5(?)');
			return $authAdapter;
		}

		public function registrationAction(){
			$registrationForm = new Form_RegistrationForm();
			$this->view->registrationForm = $registrationForm;

			if($this->getRequest()->isPost()) {
            if($registrationForm->isValid($_POST)) {
                $userModel = new Model_Users();
								$data=array(
										'login' => $registrationForm->getValue('login'),
										'email' => $registrationForm->getValue('email'),
										'password' => md5($registrationForm->getValue('password')),
										'gender' => $registrationForm->getValue('gender'),
								);

						$insertId=$userModel->insert($data);
						$this->_redirect('/index');
            }
        }
			
		}
}

?>