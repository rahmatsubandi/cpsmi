<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once( APPPATH.'controllers/AppBackend.php' );

class Donation extends AppBackend
{
	function __construct() {
    parent::__construct();
	}

	public function index() {
		$data = array(
      'app' => $this->app(),
      'card_title' => 'Donation'
    );
		$this->template->set('title', 'Donation | ' . $data['app']->app_name, TRUE);
		$this->template->load_view('donation/index', $data, TRUE);
		$this->template->render();
  }
}
