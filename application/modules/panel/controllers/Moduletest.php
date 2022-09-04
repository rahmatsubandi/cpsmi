<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once( APPPATH.'controllers/AppBackend.php' );

class ModuleTest extends AppBackend
{
	function __construct() {
    parent::__construct();
    $this->load->model('../../test/models/TestModel');
    $this->load->library('form_validation');
	}

	public function index() {
		$data = array(
      'app' => $this->app(),
      'main_js' => $this->load_main_js('moduleTest'),
      'card_title' => 'Module › Test',
      'data' => $this->TestModel->getActive()
		);
		$this->template->set('title', 'Module Test | ' . $data['app']->app_name, TRUE);
		$this->template->load_view('moduleTest/index', $data, TRUE);
		$this->template->render();
  }

  public function ajax_save() {
    $this->handle_ajax_request();
    $this->form_validation->set_rules($this->TestModel->rules());

    if ($this->form_validation->run() === true) {
      $cpUpload = new CpUpload();
      $upload = $cpUpload->run('image', 'about', true, true, 'jpg|png|gif');
      $_POST['image'] = '';

      if ($upload->status === true) {
        $_POST['image'] = $upload->data->base_path;
      };

      echo json_encode($this->TestModel->update());
    } else {
      $errors = validation_errors('<div>- ', '</div>');
      echo json_encode(array('status' => false, 'data' => $errors));
    };
  }
}
