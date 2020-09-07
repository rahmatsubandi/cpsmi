<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SettingAppModel extends CI_Model
{
  private $_table = 'setting';

  public function rules() {
    return array(
      [
        'field' => 'app_name',
        'label' => 'App Name',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'app_version',
        'label' => 'App Version',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'app_description',
        'label' => 'App Description',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'app_slogan',
        'label' => 'App Slogan',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'template_backend',
        'label' => 'Template Backend',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'theme_color',
        'label' => 'Theme Color',
        'rules' => 'required|trim'
      ]
    );
  }

  public function getDetail($where, $value) {
    return $this->db->get_where($this->_table, [$where => $value])->row();
  }

  public function update() {
    $response = array('status' => false, 'data' => 'No operation.');
    $temp_favicon = $this->getDetail('data', 'app_favicon');

    try {
      $post = $this->input->post();
      $post['app_favicon'] = (!empty($post['app_favicon'])) ? $post['app_favicon'] : $temp_favicon->content;
  
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
