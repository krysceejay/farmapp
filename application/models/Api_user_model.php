<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Api_user_model extends MY_Model{
    protected $_table = 'users';
    protected $primary_key = 'user_id';
    protected $return_type = 'array';

    protected $after_get = array('remove_sensitive_data');
    protected $before_create = array('prep_data');

    protected function remove_sensitive_data($user){
      unset($user['password']);
      return $user;
    }

    protected function prep_data($user){
      $user['password'] = md5($user['password']);

      return $user;
    }
}
