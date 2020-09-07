<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FaqModel extends CI_Model
{
  private $_table = 'faq';
  private $_tableView = '';

  public function rules() {
    return array(
      [
        'field' => 'question',
        'label' => 'Question',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'answer',
        'label' => 'Answer',
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
  
      $this->question = $post['question'];
      $this->answer = $this->br2nl($post['answer']);
      $this->is_active = $post['is_active'];
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

    try {
      $post = $this->input->post();
  
      $this->question = $post['question'];
      $this->answer = $this->br2nl($post['answer']);
      $this->is_active = $post['is_active'];
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

  function br2nl($text) {
    return str_replace("\r\n", '<br/>', htmlspecialchars_decode($text));
  }
}
