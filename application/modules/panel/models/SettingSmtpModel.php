<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SettingSmtpModel extends CI_Model
{
  private $_table = 'setting';

  public function rules() {
    return array(
      [
        'field' => 'smtp_protocol',
        'label' => 'Protocol',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'smtp_host',
        'label' => 'Host',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'smtp_port',
        'label' => 'Port',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'smtp_user',
        'label' => 'User',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'smtp_pass',
        'label' => 'Password',
        'rules' => 'required'
      ],
      [
        'field' => 'smtp_mailtype',
        'label' => 'Mailtype',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'smtp_charset',
        'label' => 'Charset',
        'rules' => 'required|trim'
      ]
    );
  }

  public function update() {
    $response = array('status' => false, 'data' => 'No operation.');

    try {
      $post = $this->input->post();
  
      foreach ($post as $key => $value) {
        $this->content = $value;
        $this->db->update($this->_table, $this, ['data' => $key]);
      };

      $response = array('status' => true, 'data' => 'Data has been saved.');
    } catch (\Throwable $th) {
      $response = array('status' => false, 'data' => 'Failed to save your data.');
    };

    return $response;
  }
}
