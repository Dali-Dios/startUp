<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Model_Users extends Zend_Db_Table {
	protected $_name='users';

	public function getUserByID($user_id) {
		$result=null;
		if ($user_id)
		{
			$select=$this->_db->select()
				->from($this->_name)
				->where($this->_name.'.id = ?',$user_id);
			$result=$this->getAdapter()
				->fetchRow($select);
		}
		return $result;
	}
}
?>
