<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once( APPPATH.'controllers/AppBackend.php' );

class Developer extends AppBackend
{
	function __construct() {
    parent::__construct();
	}

	public function index() {
		$data = array(
      'app' => $this->app(),
      'card_title' => 'Developer'
    );
		$this->template->set('title', 'Developer | ' . $data['app']->app_name, TRUE);
		$this->template->load_view('developer/index', $data, TRUE);
		$this->template->render();
  }
}
