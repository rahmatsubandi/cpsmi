<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductModel extends CI_Model
{
  private $_table = 'product';
  private $_tableView = 'view_product';

  public function rules() {
    return array(
      [
        'field' => 'product_category_id',
        'label' => 'Category',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'name',
        'label' => 'Name',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'price',
        'label' => 'Price',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'description',
        'label' => 'Description',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'send_from',
        'label' => 'Send From',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'stock',
        'label' => 'Stock',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'link',
        'label' => 'Link',
        'rules' => 'trim|required|regex_match[/^[a-z0-9-]+$/]'
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
      $post['price'] = str_replace(',', '', $post['price']);
      $post['price'] = str_replace('.', '', $post['price']);
      $post['stock'] = str_replace(',', '', $post['stock']);
      $post['stock'] = str_replace('.', '', $post['stock']);
      $post['sold_out'] = str_replace(',', '', $post['sold_out']);
      $post['sold_out'] = str_replace('.', '', $post['sold_out']);
  
      $this->product_category_id = $post['product_category_id'];
      $this->name = $post['name'];
      $this->price = $post['price'];
      $this->description = $this->br2nl($post['description']);
      $this->merk = $post['merk'];
      $this->send_from = $post['send_from'];
      $this->stock = $post['stock'];
      $this->sold_out = $post['sold_out'];
      $this->image1 = $post['image1'];
      $this->image2 = $post['image2'];
      $this->image3 = $post['image3'];
      $this->image4 = $post['image4'];
      $this->link = $post['link'];
      $this->visit_count = 0;
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
      $post['price'] = str_replace(',', '', $post['price']);
      $post['price'] = str_replace('.', '', $post['price']);
      $post['stock'] = str_replace(',', '', $post['stock']);
      $post['stock'] = str_replace('.', '', $post['stock']);
      $post['sold_out'] = str_replace(',', '', $post['sold_out']);
      $post['sold_out'] = str_replace('.', '', $post['sold_out']);
      $post['image1'] = (!empty($post['image1'])) ? $post['image1'] : $temp->image1;
      $post['image2'] = (!empty($post['image2'])) ? $post['image2'] : $temp->image2;
      $post['image3'] = (!empty($post['image3'])) ? $post['image3'] : $temp->image3;
      $post['image4'] = (!empty($post['image4'])) ? $post['image4'] : $temp->image4;
  
      $this->product_category_id = $post['product_category_id'];
      $this->name = $post['name'];
      $this->price = $post['price'];
      $this->description = $this->br2nl($post['description']);
      $this->merk = $post['merk'];
      $this->send_from = $post['send_from'];
      $this->stock = $post['stock'];
      $this->sold_out = $post['sold_out'];
      $this->image1 = $post['image1'];
      $this->image2 = $post['image2'];
      $this->image3 = $post['image3'];
      $this->image4 = $post['image4'];
      $this->link = $post['link'];
      $this->updated_by = $this->session->userdata('user')['user_id'];
      $this->db->update($this->_table, $this, ['id' => $id]);

      $response = array('status' => true, 'data' => 'Data has been saved.');
    } catch (\Throwable $th) {
      $response = array('status' => false, 'data' => 'Failed to save your data.');
    };

    return $response;
  }

  public function updateVisitCount($id) {
    $temp = $this->getDetail('id', $id);

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

  function br2nl($text) {
    return str_replace("\r\n", '<br/>', htmlspecialchars_decode($text));
  }
}
