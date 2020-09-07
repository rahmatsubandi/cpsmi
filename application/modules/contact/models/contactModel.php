<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContactModel extends CI_Model
{
  private $_table = 'contact';
  private $_tableView = '';

  public function rules() {
    return array(
      [
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'phone',
        'label' => 'Phone',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'address',
        'label' => 'Address',
        'rules' => 'required|trim'
      ],
    );
  }

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
        if (in_array($item->data, array('hours1','hours2','hours3','hours4','hours5','hours6','hours7'))) {
          if (strtolower(trim($item->content)) !== 'closed') {
            $hours = explode(' - ', $item->content);
            $result[$item->data]['open'] = $hours[0];
            $result[$item->data]['close'] = $hours[1];
          } else {
            $result[$item->data]['open'] = 'Closed';
            $result[$item->data]['close'] = 'Closed';
          };
        } else {
          $result[$item->data] = $item->content;
        };
      };
    };

    return json_encode($result);
  }

  public function update() {
    $response = array('status' => false, 'data' => 'No operation.');

    try {
      $post = $this->input->post();

      for ($i = 1; $i <= 7; $i++) {
        $post['hours'.$i] = (isset($post['hours'.$i.'_check'])) ? 'Closed' : $post['hours'.$i.'_open'].' - '.$post['hours'.$i.'_close'];
        unset($post['hours'.$i.'_check']);
        unset($post['hours'.$i.'_open']);
        unset($post['hours'.$i.'_close']);
      };
  
      foreach ($post as $key => $value) {
        $this->content = $this->br2nl($value);
        $this->db->update($this->_table, $this, ['data' => $key]);
      };

      $response = array('status' => true, 'data' => 'Data has been saved.');
    } catch (\Throwable $th) {
      $response = array('status' => false, 'data' => 'Failed to save your data.');
    };

    return $response;
  }

  function br2nl($text) {
    return str_replace("\r\n", '<br/>', htmlspecialchars_decode($text));
  }
}
