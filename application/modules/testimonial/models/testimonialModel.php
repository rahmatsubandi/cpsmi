<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestimonialModel extends CI_Model
{
  private $_table = 'testimonial';
  private $_tableView = '';

  public function rules() {
    return array(
      [
        'field' => 'creator_name',
        'label' => 'Creator Name',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'job',
        'label' => 'Job',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'content',
        'label' => 'Content',
        'rules' => 'trim|required'
      ]
    );
  }
  
  public function getRowCount(){
		return $this->db->get($this->_table)->num_rows();
	}

  public function getAll($params = [], $orders = null, $limit = null, $offset = null) {
    return $this->db->where($params)->order_by($orders)->get($this->_table, $limit, $offset)->result();
  }

  public function getDetail($where, $value) {
    return $this->db->get_where($this->_table, [$where => $value])->row();
  }

  public function getLatest($limit = 5) {
    return $this->db->order_by('id', 'desc')->limit($limit)->get($this->_table)->result();
  }

  public function insert() {
    $response = array('status' => false, 'data' => 'No operation.');

    try {
      $post = $this->input->post();
  
      $this->creator_name = $post['creator_name'];
      $this->job = $post['job'];
      $this->content = $post['content'];
      $this->creator_link = $post['creator_link'];
      $this->creator_photo = $post['creator_photo'];
      $this->screenshot = $post['screenshot'];
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
      $post['creator_photo'] = (!empty($post['creator_photo'])) ? $post['creator_photo'] : $temp->creator_photo;
      $post['screenshot'] = (!empty($post['screenshot'])) ? $post['screenshot'] : $temp->screenshot;
  
      $this->creator_name = $post['creator_name'];
      $this->job = $post['job'];
      $this->content = $post['content'];
      $this->creator_link = $post['creator_link'];
      $this->creator_photo = $post['creator_photo'];
      $this->screenshot = $post['screenshot'];
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
