<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AboutModel extends CI_Model
{
  private $_table = 'about';
  private $_tableView = '';

  public function rules() {
    return array(
      [
        'field' => 'content',
        'label' => 'Content',
        'rules' => 'required'
      ]
    );
  }

  public function getActive() {
    return $this->db->order_by('id', 'desc')->limit('1')->get($this->_table)->row();
  }

  public function update() {
    $response = array('status' => false, 'data' => 'No operation.');
    $temp = $this->getActive();

    try {
      $post = $this->input->post();
      $post['image'] = (!empty($post['image'])) ? $post['image'] : $temp->image;
  
      $this->image = $post['image'];
      $this->content = $post['content'];
      $this->db->update($this->_table, $this, ['id' => $temp->id]);

      $response = array('status' => true, 'data' => 'Data has been saved.');
    } catch (\Throwable $th) {
      $response = array('status' => false, 'data' => 'Failed to save your data.');
    };

    return $response;
  }
}
