<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model
{
  private $_table = 'user';

  public function rules() {
    return array(
      [
        'field' => 'username',
        'label' => 'NIK',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'password',
        'label' => 'Password',
        'rules' => 'required'
      ]
    );
  }

  public function getDetail($params = []) {
    return $this->db->where($params)->get($this->_table)->row();
  }
}
