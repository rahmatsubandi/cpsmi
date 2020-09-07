<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardModel extends CI_Model
{
  private $_table = 'dashboard';
  private $_tableView = '';

  public function getAll() {
    return $this->db->get($this->_table)->result();
  }

  public function getDetail($where, $value) {
    return $this->db->get_where($this->_table, [$where => $value])->row();
  }

  public function getObject() {
    $data = $this->db->get($this->_table)->result();
    $result = array();

    if (count($data) > 0) {
      foreach ($data as $index => $item) {
        $result[$item->data] = $item->content;
      };
    };

    return json_encode($result);
  }

  public function update() {
    $response = array('status' => false, 'data' => 'No operation.');
    $temp = json_decode($this->getObject());

    try {
      $post = $this->input->post();
      $post['background_image'] = (!empty($post['background_image'])) ? $post['background_image'] : $temp->background_image;
      $post['intro_image'] = (!empty($post['intro_image'])) ? $post['intro_image'] : $temp->intro_image;
  
      foreach ($post as $key => $value) {
        $this->content = htmlspecialchars_decode($value);
        $this->db->update($this->_table, $this, ['data' => $key]);
      };

      $response = array('status' => true, 'data' => 'Data has been saved.');
    } catch (\Throwable $th) {
      $response = array('status' => false, 'data' => 'Failed to save your data.');
    };

    return $response;
  }
}
