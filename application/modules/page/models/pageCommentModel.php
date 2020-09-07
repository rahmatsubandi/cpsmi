<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PageCommentModel extends CI_Model
{
  private $_table = 'page_comment';
  private $_tableView = '';

  public function rules() {
    return array(
      [
        'field' => 'page_id',
        'label' => 'Page',
        'rules' => 'required'
      ],
      [
        'field' => 'author_name',
        'label' => 'Full Name',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'author_email',
        'label' => 'Email',
        'rules' => 'trim|required|valid_email'
      ],
      [
        'field' => 'content',
        'label' => 'Content',
        'rules' => 'trim|required'
      ]
    );
  }
  
  public function getRowCount($params = []) {
		return $this->db->where($params)->get($this->_table)->num_rows();
	}

  public function getAll($params = [], $order = null, $limit = null, $offset = null) {
    return $this->db->where($params)->order_by($order)->get($this->_table, $limit, $offset)->result();
  }

  public function getDetail($where, $value) {
    return $this->db->get_where($this->_table, [$where => $value])->row();
  }

  public function getLatest($limit = 6) {
    return $this->db->order_by('id', 'desc')->limit($limit)->get($this->_table)->result();
  }

  public function search($q) {
    return $this->db->like('author_name', $q)->or_like('author_email', $q)->get($this->_table)->result();
  }

  public function insert() {
    $response = array('status' => false, 'data' => 'No operation.');

    try {
      $post = $this->input->post();
  
      $this->page_id = $post['page_id'];
      $this->author_name = $post['author_name'];
      $this->author_email = $post['author_email'];
      $this->author_photo = $post['author_photo'];
      $this->content = $this->br2nl($post['content']);
      $this->db->insert($this->_table, $this);

      $response = array('status' => true, 'data' => 'Your comment has been added.');
    } catch (\Throwable $th) {
      $response = array('status' => false, 'data' => 'Failed to post your comment.');
    };

    return $response;
  }

  public function delete($id) {
    $response = array('status' => false, 'data' => 'No operation.');

    try {
      $this->db->delete($this->_table, ['id' => $id]);
      $response = array('status' => true, 'data' => 'The comment has been deleted.');
    } catch (\Throwable $th) {
      $response = array('status' => false, 'data' => 'Failed to delete the comment.');
    };

    return $response;
  }
  
  function br2nl($text) {
    return str_replace("\r\n", '<br/>', htmlspecialchars_decode($text));
  }
}
