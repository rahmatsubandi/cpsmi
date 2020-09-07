<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SettingAccountModel extends CI_Model
{
  private $_table = 'user';

  public function rules() {
    return array(
      [
        'field' => 'username',
        'label' => 'Username',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'old_password',
        'label' => 'Old Password',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'new_password',
        'label' => 'New Password',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'confirm_password',
        'label' => 'Confirm Password',
        'rules' => 'required|trim'
      ]
    );
  }

  public function getDetail($params) {
    return $this->db->where($params)->get($this->_table)->row();
  }

  public function updatePassword() {
    $response = array('status' => false, 'data' => 'No operation.');

    try {
      $post = $this->input->post();

      if ($post['confirm_password'] === $post['new_password']) {
        $temp = $this->getDetail(['username' => $post['username'], 'password' => md5($post['old_password']), 'is_active' => '1']);

        if (count($temp) == 1) {
          $this->password = md5($post['new_password']);
          $this->db->update($this->_table, $this, ['username' => $post['username']]);
    
          $response = array('status' => true, 'data' => 'Your password has been changed.');
        } else {
          $response = array('status' => false, 'data' => 'Old password is not match!');
        };
      } else {
        $response = array('status' => false, 'data' => 'Confirm password and new password is not match!');
      };
    } catch (\Throwable $th) {
      $response = array('status' => false, 'data' => 'Failed to save your account.');
    };

    return $response;
  }
}
