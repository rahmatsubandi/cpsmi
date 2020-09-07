<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SettingModel extends CI_Model
{
  private $_table = 'setting';

  public function rules() {
    return array(
      [
        'field' => 'data',
        'label' => 'Key',
        'rules' => 'required'
      ],
      [
        'field' => 'content',
        'label' => 'Content',
        'rules' => 'required'
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
    $post = $this->input->post();
    $this->data = $post['data'];
    $this->content = $post['content'];
    $this->db->insert($this->_table, $this);
  }

  public function update() {
    $post = $this->input->post();
    $this->data = $post['data'];
    $this->content = $post['content'];
    $this->db->update($this->_table, $this, ['id' => $post['id']]);
  }

  public function updateRecord($key, $value) {
    $response = array('status' => false, 'data' => 'No operation.');

    try {
      $this->content = $value;
      $this->db->update($this->_table, $this, ['data' => $key]);

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
