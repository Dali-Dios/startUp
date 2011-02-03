<?php
/**
 * MY!!!!!!!!!!!
 * 
 */

class My_Acl extends Zend_Acl {

  public function __construct() {
    //Add a new roles
        $this->addRole(new Zend_Acl_Role('guest'));
        $this->addRole(new Zend_Acl_Role('user'), 'guest');
        $this->addRole(new Zend_Acl_Role('moderator'), 'user');

    //Add new resources
        $this->add(new Zend_Acl_Resource('index'));
        $this->add(new Zend_Acl_Resource('auth'));
        $this->add(new Zend_Acl_Resource('admin'));
        $this->add(new Zend_Acl_Resource('trips'), 'index');
        $this->add(new Zend_Acl_Resource('review'), 'trips');
        $this->add(new Zend_Acl_Resource('upload'), 'review');
        $this->add(new Zend_Acl_Resource('search'), 'index');
        $this->add(new Zend_Acl_Resource('error'));
        $this->add(new Zend_Acl_Resource('profile'));
        $this->add(new Zend_Acl_Resource('gmaps'));
        $this->add(new Zend_Acl_Resource('cron'));
        $this->add(new Zend_Acl_Resource('forum'));
        $this->add(new Zend_Acl_Resource('static'));
        $this->add(new Zend_Acl_Resource('subscribe'));
        $this->add(new Zend_Acl_Resource('friends'));
        $this->add(new Zend_Acl_Resource('trip'));


    //guests to authorization
    $this->allow('guest', 'auth');
    //guests to authorization
    $this->allow('guest', 'index');
    //guests to error page //TODO: future make only to moderators
    $this->allow('guest', 'error');
    //guests to work with gmaps
    $this->allow('guest', 'gmaps');
    //to work with cron
    $this->allow('guest', 'cron');
    $this->allow('user', 'cron');
    //guests to work with forum
    $this->allow('guest', 'forum');
    //guests to work with forum
    $this->allow('user', 'subscribe');
    $this->allow('guest', 'subscribe', 'osubscribe');
    $this->allow('guest', 'subscribe', 'ohotelsubscribe');
    $this->allow('guest', 'subscribe', 'confirm');
    //guests to work with forum
    $this->allow('guest', 'static');
    $this->allow('user', 'friends');

    //deny users to authorization
    $this->deny('user', 'auth');
    $this->allow('user', 'auth', 'logout');
    //$this->allow('user', 'auth', 'confirm');
    $this->allow('user', 'auth', 'checkflogin');
    $this->allow('user', 'auth', 'savenewlogin');
    $this->allow('user', 'auth', 'refreshform');
    $this->allow('user', 'auth', 'loginvk');

    $this->allow('guest', 'trip');


    $this->allow('guest', 'friends', 'confirm');
    $this->allow('guest', 'friends', 'resetref');

    $this->deny('guest', 'profile');
    $this->allow('guest', 'profile', 'userinfo');
    $this->allow('user', 'profile');
    $this->allow('guest', 'profile', 'usertip');

    //and moderator can access to admin area
    $this->allow('moderator', 'admin');
  }
}