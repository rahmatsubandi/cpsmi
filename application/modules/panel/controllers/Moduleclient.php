<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once( APPPATH.'controllers/AppBackend.php' );

class ModuleClient extends AppBackend
{
	function __construct() {
    parent::__construct();
    $this->load->model([
      'AppModel',
      '../../client/models/ClientModel'
    ]);
    $this->load->library('form_validation');
	}

	public function index() {
		$data = array(
      'app' => $this->app(),
      'main_js' => $this->load_main_js('moduleClient'),
			'card_title' => 'Module › Client'
		);
		$this->template->set('title', 'Module Client | ' . $data['app']->app_name, TRUE);
		$this->template->load_view('moduleClient/index', $data, TRUE);
		$this->template->render();
  }
  
  public function ajax_getAll() {
    $this->handle_ajax_request();
		$dtAjax_config = array(
      'table_name' => 'client',
      'order_column' => 3,
      'order_direction' => 'desc'
		);
    $response = $this->AppModel->getData_dtAjax( $dtAjax_config );
		echo json_encode( $response );
  }

  public function ajax_save($id = null) {
    $this->handle_ajax_request();
    $this->form_validation->set_rules($this->ClientModel->rules());

    if ($this->form_validation->run() === true) {
      $cpUpload = new CpUpload();
      $upload = $cpUpload->run('logo', 'client', true, true, 'jpg|png|gif');

      if (is_null($id)) {
        // Insert
        if ($upload->status === true) {
          $_POST['logo'] = $upload->data->base_path;
          echo json_encode($this->ClientModel->insert());
        } else {
          echo json_encode(array('status' => false, 'data' => $upload->data));
        };
      } else {
        // Update
        $_POST['logo'] = '';
        if ($upload->status === true) {
          $_POST['logo'] = $upload->data->base_path;
        };
        echo json_encode($this->ClientModel->update($id));
      };
    } else {
      $errors = validation_errors('<div>- ', '</div>');
      echo json_encode(array('status' => false, 'data' => $errors));
    };
  }

  public function ajax_delete($id) {
    $this->handle_ajax_request();
    echo json_encode($this->ClientModel->delete($id));
  }
}
