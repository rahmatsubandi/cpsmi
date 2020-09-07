<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends MX_Controller
{
	function __construct() {
    parent::__construct();
	}

	public function index() {
    $this->session->unset_userdata('user');
		redirect(base_url('panel/login/'));
  }
}
