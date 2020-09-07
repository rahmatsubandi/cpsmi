<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClientModel extends CI_Model
{
  private $_table = 'client';
  private $_tableView = '';

  public function rules() {
    return array(
      [
        'field' => 'name',
        'label' => 'Name',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'link',
        'label' => 'Link',
        'rules' => 'trim|required|valid_url'
      ]
    );
  }

  public function getAll() {
    return $this->db->get($this->_table)->result();
  }

  public function getDetail($where, $value) {
    return $this->db->get_where($this->_table, [$where => $value])->row();
  }

  public function insert() {
    $response = array('status' => false, 'data' => 'No operation.');

    try {
      $post = $this->input->post();
  
      $this->name = $post['name'];
      $this->link = $post['link'];
      $this->logo = $post['logo'];
      $this->created_at = date('Y-m-d H:i:s');
      $this->created_by = $this->session->userdata('user')['user_id'];
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
      $post['logo'] = (!empty($post['logo'])) ? $post['logo'] : $temp->logo;
  
      $this->name = $post['name'];
      $this->link = $post['link'];
      $this->logo = $post['logo'];
      $this->updated_by = $this->session->userdata('user')['user_id'];
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
