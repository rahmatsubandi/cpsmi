<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CareerModel extends CI_Model
{
  private $_table = 'career';
  private $_tableView = 'view_career';

  public function rules() {
    return array(
      [
        'field' => 'name',
        'label' => 'Name',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'company_name',
        'label' => 'Company Name',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'email',
        'label' => 'Company Email',
        'rules' => 'trim|required|valid_email'
      ],
      [
        'field' => 'location_province',
        'label' => 'Province',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'location',
        'label' => 'Regency',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'closing_date',
        'label' => 'Closing Date',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'currency_unit',
        'label' => 'Currency Unit',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'age1',
        'label' => 'Age Range (From)',
        'rules' => 'trim|required|integer'
      ],
      [
        'field' => 'age2',
        'label' => 'Age Range (To)',
        'rules' => 'trim|required|integer'
      ],
      [
        'field' => 'education[]',
        'label' => 'Education',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'type_work',
        'label' => 'Type Of Work',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'description',
        'label' => 'Description',
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
      $post['education'] = (isset($post['education']) && is_array($post['education'])) ? implode(' / ', $post['education']) : 'undefined';
      $post['salary1'] = str_replace(',', '', $post['salary1']);
      $post['salary1'] = str_replace('.', '', $post['salary1']);
      $post['salary2'] = str_replace(',', '', $post['salary2']);
      $post['salary2'] = str_replace('.', '', $post['salary2']);
  
      $this->name = $post['name'];
      $this->company_name = $post['company_name'];
      $this->email = $post['email'];
      $this->location = $post['location'];
      $this->salary1 = $post['salary1'];
      $this->salary2 = $post['salary2'];
      $this->currency_unit = $post['currency_unit'];
      $this->published = date('Y-m-d');
      $this->closing_date = $post['closing_date'];
      $this->age1 = $post['age1'];
      $this->age2 = $post['age2'];
      $this->education = $post['education'];
      $this->type_work = $post['type_work'];
      $this->description = $post['description'];
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
      $post['education'] = (isset($post['education']) && is_array($post['education'])) ? implode(' / ', $post['education']) : 'undefined';
      $post['salary1'] = str_replace(',', '', $post['salary1']);
      $post['salary1'] = str_replace('.', '', $post['salary1']);
      $post['salary2'] = str_replace(',', '', $post['salary2']);
      $post['salary2'] = str_replace('.', '', $post['salary2']);
  
      $this->name = $post['name'];
      $this->company_name = $post['company_name'];
      $this->email = $post['email'];
      $this->location = $post['location'];
      $this->salary1 = $post['salary1'];
      $this->salary2 = $post['salary2'];
      $this->currency_unit = $post['currency_unit'];
      $this->published = date('Y-m-d');
      $this->closing_date = $post['closing_date'];
      $this->age1 = $post['age1'];
      $this->age2 = $post['age2'];
      $this->education = $post['education'];
      $this->type_work = $post['type_work'];
      $this->description = $post['description'];
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
