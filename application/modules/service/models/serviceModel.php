<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ServiceModel extends CI_Model
{
  private $_table = 'service';
  private $_tableView = '';

  public function rules() {
    return array(
      [
        'field' => 'name',
        'label' => 'Name',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'icon',
        'label' => 'Icon',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'icon_color',
        'label' => 'Icon Color',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'background_color',
        'label' => 'Background Color',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'description',
        'label' => 'Description',
        'rules' => 'trim|required'
      ]
    );
  }

  public function getAll($params = [], $order = null) {
    return $this->db->where($params)->order_by($order)->get($this->_table)->result();
  }

  public function getDetail($where, $value) {
    return $this->db->get_where($this->_table, [$where => $value])->row();
  }

  public function insert() {
    $response = array('status' => false, 'data' => 'No operation.');

    try {
      $post = $this->input->post();
  
      $this->name = $post['name'];
      $this->description = $this->br2nl($post['description']);
      $this->icon = $post['icon'];
      $this->background_color = $post['background_color'];
      $this->icon_color = $post['icon_color'];
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
  
      $this->name = $post['name'];
      $this->description = $this->br2nl($post['description']);
      $this->icon = $post['icon'];
      $this->background_color = $post['background_color'];
      $this->icon_color = $post['icon_color'];
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
