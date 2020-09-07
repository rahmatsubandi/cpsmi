<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegenciesModel extends CI_Model
{
  private $_table = 'regencies';
  private $_tableView = '';

  public function getAll() {
    return $this->db->get($this->_table)->result();
  }

  public function getDetail($where, $value) {
    return $this->db->get_where($this->_table, [$where => $value])->row();
  }

  public function getFilter($where, $value) {
    return $this->db->get_where($this->_table, [$where => $value])->result();
  }
}
