<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProvincesRegenciesModel extends CI_Model
{
  private $_table = '';
  private $_tableView = 'view_provinces_regencies';

  public function getAll() {
    return $this->db->get($this->_tableView)->result();
  }

  public function getDetail($where, $value) {
    return $this->db->get_where($this->_tableView, [$where => $value])->row();
  }

  public function getFilter($where, $value) {
    return $this->db->get_where($this->_tableView, [$where => $value])->result();
  }
}
