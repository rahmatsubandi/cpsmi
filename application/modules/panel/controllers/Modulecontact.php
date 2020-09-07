<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once( APPPATH.'controllers/AppBackend.php' );

class ModuleContact extends AppBackend
{
	function __construct() {
    parent::__construct();
    $this->load->model('../../contact/models/ContactModel');
	}

	public function index() {
		$data = array(
      'app' => $this->app(),
      'main_js' => $this->load_main_js('moduleContact'),
      'card_title' => 'Module › Contact',
      'data' => json_decode($this->ContactModel->getObject())
    );

		$this->template->set('title', 'Module Contact | ' . $data['app']->app_name, TRUE);
		$this->template->load_view('moduleContact/index', $data, TRUE);
		$this->template->render();
  }

  public function ajax_save() {
    $this->handle_ajax_request();
    $this->form_validation->set_rules($this->ContactModel->rules());

    if ($this->form_validation->run() === true) {
      // Upload File
      $_POST['img_map'] = '';

      $cpUpload = new CpUpload();
      
      if (isset($_FILES['img_map']) && !empty($_FILES['img_map']['name'])) {
        $upload1 = $cpUpload->run('img_map', 'contact', true, true, 'jpg|jpeg|png|gif');
        if ($upload1->status === true) {
          $_POST['img_map'] = $upload1->data->base_path;
        } else {
          echo json_encode(array('status' => false, 'data' => 'Map Location : '.$upload1->data));
          die;
        };
      } else {
        $temp = json_decode($this->ContactModel->getObject());
        if (empty($temp->img_map) || is_null($temp->img_map)) {
          echo json_encode(array('status' => false, 'data' => 'The Map Location field is required.'));
          die;
        } else {
          $_POST['img_map'] = $temp->img_map;
        };
      };
      // END ## Upload File

      echo json_encode($this->ContactModel->update());
    } else {
      $errors = validation_errors('<div>- ', '</div>');
      echo json_encode(array('status' => false, 'data' => $errors));
    };
  }
}
