<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once( APPPATH.'controllers/AppBackend.php' );

class ModuleVisimisi extends AppBackend
{
	function __construct() {
    parent::__construct();
    $this->load->model('../../visimisi/models/VisimisiModel');
    $this->load->library('form_validation');
	}

	public function index() {
		$data = array(
      'app' => $this->app(),
      'main_js' => $this->load_main_js('moduleVisimisi'),
      'card_title' => 'Module › Visi & Misi',
      'data' => $this->VisimisiModel->getActive()
		);
		$this->template->set('title', 'Module Visi & Misi | ' . $data['app']->app_name, TRUE);
		$this->template->load_view('moduleVisimisi/index', $data, TRUE);
		$this->template->render();
  }

  public function ajax_save() {
    $this->handle_ajax_request();
    $this->form_validation->set_rules($this->VisimisiModel->rules());

    if ($this->form_validation->run() === true) {
      echo json_encode($this->VisimisiModel->save());
    } else {
      $errors = validation_errors('<div>- ', '</div>');
      echo json_encode(array('status' => false, 'data' => $errors));
    };
  }
}
