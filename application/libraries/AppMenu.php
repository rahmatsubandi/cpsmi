<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class AppMenu
{
  var $CI;

	function __construct() {
    $this->CI =& get_instance();
    $this->load_admin_model(['MenuModel']);
  }
    
  private function load_admin_model($models = []) {
    $result = [];
    foreach ($models as $index => $item) {
      $result[] = '../modules/panel/models/'.$item;
    };
    return $this->CI->load->model($result);
  }
    
  public function getAll() {
    return $this->CI->MenuModel->getRecursive();
  }
}
