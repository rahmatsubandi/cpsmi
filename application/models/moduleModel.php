<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModuleModel extends CI_Model
{
  private $_table = 'module';
  private $_tableView = '';

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
      $this->path = $post['path'];
      $this->description = $post['description'];
      $this->is_active = $post['is_active'];
      $this->db->insert($this->_table, $this);

      $response = array('status' => true, 'data' => 'Data has been saved.');
    } catch (\Throwable $th) {
      $response = array('status' => false, 'data' => 'Failed to save your data.');
    };

    return $response;
  }

  public function update() {
    $response = array('status' => false, 'data' => 'No operation.');

    try {
      $post = $this->input->post();
  
      $this->name = $post['name'];
      $this->path = $post['path'];
      $this->description = $post['description'];
      $this->is_active = $post['is_active'];
      $this->db->update($this->_table, $this, ['id' => $post['id']]);

      $response = array('status' => true, 'data' => 'Data has been saved.');
    } catch (\Throwable $th) {
      $response = array('status' => false, 'data' => 'Failed to save your data.');
    };

    return $response;
  }

  public function delete($id) {
    return $this->db->delete($this->_table, ['id' => $id]);
  }
}
