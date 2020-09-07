<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BlogModel extends CI_Model
{
  private $_table = 'blog';
  private $_tableView = 'view_blog';

  public function rules() {
    return array(
      [
        'field' => 'blog_category_id',
        'label' => 'Category',
        'rules' => 'required'
      ],
      [
        'field' => 'title',
        'label' => 'Title',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'content',
        'label' => 'Content',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'snippet',
        'label' => 'Snippet',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'link',
        'label' => 'Link',
        'rules' => 'trim|required|regex_match[/^[a-z0-9-]+$/]'
      ],
      [
        'field' => 'is_comment',
        'label' => 'Comments',
        'rules' => 'required'
      ]
    );
  }
  
  public function getRowCount(){
		return $this->db->get($this->_table)->num_rows();
	}

  public function getAll($params = [], $limit = null, $offset = null) {
    return $this->db->where($params)->get($this->_tableView, $limit, $offset)->result();
  }

  public function getDetail($where, $value) {
    return $this->db->get_where($this->_tableView, [$where => $value])->row();
  }

  public function getLatest($limit = 6) {
    return $this->db->order_by('id', 'desc')->limit($limit)->get($this->_tableView)->result();
  }

  public function search($q) {
    return $this->db->like('title', $q)->or_like('snippet', $q)->get($this->_tableView)->result();
  }

  public function insert() {
    $response = array('status' => false, 'data' => 'No operation.');

    try {
      $post = $this->input->post();
  
      $this->blog_category_id = $post['blog_category_id'];
      $this->title = $post['title'];
      $this->content = $post['content'];
      $this->snippet = $post['snippet'];
      $this->cover = $post['cover'];
      $this->link = $post['link'];
      $this->visit_count = 0;
      $this->is_comment = $post['is_comment'];
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
      $post['cover'] = (!empty($post['cover'])) ? $post['cover'] : $temp->cover;
  
      $this->blog_category_id = $post['blog_category_id'];
      $this->title = $post['title'];
      $this->content = $post['content'];
      $this->snippet = $post['snippet'];
      $this->cover = $post['cover'];
      $this->link = $post['link'];
      $this->is_comment = $post['is_comment'];
      $this->updated_by = $this->session->userdata('user')['user_id'];
      $this->db->update($this->_table, $this, ['id' => $id]);

      $response = array('status' => true, 'data' => 'Data has been saved.');
    } catch (\Throwable $th) {
      $response = array('status' => false, 'data' => 'Failed to save your data.');
    };

    return $response;
  }

  public function updateVisitCount($link) {
    $temp = $this->getDetail('link', $link);

    try {
      $this->visit_count = (int) $temp->visit_count + 1;
      $this->db->update($this->_table, $this, ['id' => $temp->id]);

      return true;
    } catch (\Throwable $th) {
      return false;
    };
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
