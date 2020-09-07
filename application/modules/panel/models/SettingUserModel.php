<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SettingUserModel extends CI_Model
{
  private $_table = 'user';
  private $_tableView = '';

  public function rulesInsert() {
    return array(
      [
        'field' => 'full_name',
        'label' => 'Full Name',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'username',
        'label' => 'Username',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'password',
        'label' => 'New Password',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'is_active',
        'label' => 'Is Active',
        'rules' => 'trim|required'
      ]
    );
  }

  public function rulesUpdate() {
    return array(
      [
        'field' => 'full_name',
        'label' => 'Full Name',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'username',
        'label' => 'Username',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'is_active',
        'label' => 'Is Active',
        'rules' => 'trim|required'
      ]
    );
  }

  public function getAll($params = []) {
    return $this->db->where($params)->get($this->_table)->result();
  }

  public function getDetail($where, $value) {
    return $this->db->get_where($this->_table, [$where => $value])->row();
  }

  public function insert() {
    $response = array('status' => false, 'data' => 'No operation.');

    try {
      $post = $this->input->post();
  
      $this->full_name = $post['full_name'];
      $this->username = $post['username'];
      $this->password = md5($post['password']);
      $this->profile_photo = $post['profile_photo'];
      $this->is_active = $post['is_active'];
      $this->db->insert($this->_table, $this);

      $response = array('status' => true, 'data' => 'Data has been saved.');
    } catch (\Throwable $th) {
      $response = array('status' => false, 'data' => 'Failed to save your data.');
    };

    return $response;
  }

  public function update($id) {
    $response = array('status' => false, 'data' => 'No operation.');
    $temp = $this->getDetail('id', $id);

    try {
      $post = $this->input->post();
      $post['profile_photo'] = (!empty($post['profile_photo'])) ? $post['profile_photo'] : $temp->profile_photo;
  
      $this->full_name = $post['full_name'];
      $this->username = $post['username'];

      if (isset($post['password']) && !empty($post['password'])) {
        $this->password = md5($post['password']);
      };

      $this->profile_photo = $post['profile_photo'];
      $this->is_active = $post['is_active'];
      $this->db->update($this->_table, $this, ['id' => $id]);

      $response = array('status' => true, 'data' => 'Data has been saved.');
    } catch (\Throwable $th) {
      $response = array('status' => false, 'data' => 'Failed to save your data.');
    };

    return $response;
  }

  public function delete($id) {
    $response = array('status' => false, 'data' => 'No operation.');

    try {
      $this->db->delete($this->_table, ['id' => $id]);
      $response = array('status' => true, 'data' => 'Data has been deleted.');
    } catch (\Throwable $th) {
      $response = array('status' => false, 'data' => 'Failed to delete your data.');
    };

    return $response;
  }
}
