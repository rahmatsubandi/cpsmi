<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PortfolioModel extends CI_Model
{
  private $_table = 'portfolio';
  private $_tableView = 'view_portfolio';

  public function rules() {
    return array(
      [
        'field' => 'portfolio_tag_id',
        'label' => 'Tag',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'name',
        'label' => 'Name',
        'rules' => 'trim|required'
      ]
    );
  }
  
  public function getRowCount(){
		return $this->db->get($this->_table)->num_rows();
	}

  public function getAll($params = [], $orders = [], $limit = null, $offset = null) {
    return $this->db->where($params)->order_by($orders)->get($this->_tableView, $limit, $offset)->result();
  }

  public function getDetail($where, $value) {
    return $this->db->get_where($this->_tableView, [$where => $value])->row();
  }

  public function getLatest($limit = 6) {
    return $this->db->order_by('id', 'desc')->limit($limit)->get($this->_tableView)->result();
  }

  public function insert() {
    $response = array('status' => false, 'data' => 'No operation.');

    try {
      $post = $this->input->post();
  
      $this->portfolio_tag_id = $post['portfolio_tag_id'];
      $this->name = $post['name'];
      $this->external_link = $post['external_link'];
      $this->image = $post['image'];
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
      $post['image'] = (!empty($post['image'])) ? $post['image'] : $temp->image;
  
      $this->portfolio_tag_id = $post['portfolio_tag_id'];
      $this->name = $post['name'];
      $this->external_link = $post['external_link'];
      $this->image = $post['image'];
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
