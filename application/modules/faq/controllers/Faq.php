<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once( APPPATH.'controllers/App.php' );

class Faq extends App
{
	function __construct() {
		parent::__construct();
		$this->load->model('FaqModel');
	}

	public function index() {
		$data = array(
			'app' => $this->app(),
			'data' => $this->FaqModel->getAll(['is_active' => '1'])
		);

		$this->template->set('title', $data['app']->active_module->name . ' | ' . $data['app']->app_name, TRUE);
		$this->template->load_view($data['app']->template_frontend.'/index', $data, TRUE);
		$this->template->render();
	}
}
