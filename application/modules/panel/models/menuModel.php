<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuModel extends CI_Model
{
  private $_table = 'menu';
  private $_tableView = 'view_menu';

  public function rules() {
    return array(
      [
        'field' => 'parent_id',
        'label' => 'Parent',
        'rules' => 'required'
      ],
      [
        'field' => 'name',
        'label' => 'Name',
        'rules' => 'required'
      ],
      [
        'field' => 'link',
        'label' => 'Link',
        'rules' => 'trim|required|regex_match[/^[a-z0-9-]+$/]'
      ],
      [
        'field' => 'is_newtab',
        'label' => 'Open In New Tab',
        'rules' => 'required'
      ],
      [
        'field' => 'order_pos',
        'label' => 'Order',
        'rules' => 'required'
      ]
    );
  }

  public function getAll() {
    return $this->db->get($this->_tableView)->result();
  }

  public function getDetail($where, $value) {
    return $this->db->get_where($this->_tableView, [$where => $value])->row();
  }

  public function getRecursive($parent_id = null) {
    $result = [];
    $data = $this->db->order_by('order_pos', 'asc')->get_where($this->_tableView, ['parent_id' => $parent_id])->result();

    foreach ($data as $index => $item) {
      $item->childs = $this->getRecursive($item->id);
      $result[$item->id] = $item;
    };

    return $result;
  }

  public function insert() {
    $response = array('status' => false, 'data' => 'No operation.');

    try {
      $post = $this->input->post();
      $post['parent_id'] = ($post['parent_id'] == "0") ? null : $post['parent_id'];
      $post['link_tobase'] = (isset($post['link_tobase']) && !is_null($post['link_tobase'])) ? $post['link_tobase'] : '0';
  
      $this->parent_id = $post['parent_id'];
      $this->name = $post['name'];
      $this->order_pos = $post['order_pos'];
      $this->link = $post['link'];
      $this->link_tobase = $post['link_tobase'];
      $this->is_newtab = $post['is_newtab'];
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
      $post['parent_id'] = ($post['parent_id'] == "0") ? null : $post['parent_id'];
      $post['link_tobase'] = (isset($post['link_tobase']) && !is_null($post['link_tobase'])) ? $post['link_tobase'] : '0';
  
      $this->parent_id = $post['parent_id'];
      $this->name = $post['name'];
      $this->order_pos = $post['order_pos'];
      $this->link = $post['link'];
      $this->link_tobase = $post['link_tobase'];
      $this->is_newtab = $post['is_newtab'];
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
