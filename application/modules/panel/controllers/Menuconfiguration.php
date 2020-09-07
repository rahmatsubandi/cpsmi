<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once( APPPATH.'controllers/AppBackend.php' );

class MenuConfiguration extends AppBackend
{
	function __construct() {
    parent::__construct();
    $this->load->model(['AppModel', 'MenuModel']);
    $this->load->library('form_validation');
	}

	public function index() {
		$data = array(
      'app' => $this->app(),
      'main_js' => $this->load_main_js('menuConfiguration'),
			'card_title' => 'Menu Configuration'
		);
		$this->template->set('title', 'Menu Configuration | ' . $data['app']->app_name, TRUE);
		$this->template->load_view('menuConfiguration/index', $data, TRUE);
		$this->template->render();
  }
  
  public function ajax_getAll() {
    $this->handle_ajax_request();
		$dtAjax_config = array(
      'table_name' => 'view_menu',
      'order_column' => 6
		);
    $response = $this->AppModel->getData_dtAjax( $dtAjax_config );
		echo json_encode( $response );
  }
  
  public function ajax_getRefAll() {
    $this->handle_ajax_request();
    $response['data'] = $this->MenuModel->getAll();
    echo json_encode($response);
  }

  public function ajax_save($id = null) {
    $this->handle_ajax_request();
    $this->form_validation->set_rules($this->MenuModel->rules());

    if ($this->form_validation->run() === true) {
      if (is_null($id)) {
        echo json_encode($this->MenuModel->insert());
      } else {
        echo json_encode($this->MenuModel->update($id));
      };
    } else {
      $errors = validation_errors('<div>- ', '</div>');
      echo json_encode(array('status' => false, 'data' => $errors));
    };
  }

  public function ajax_delete($id) {
    $this->handle_ajax_request();
    echo json_encode($this->MenuModel->delete($id));
  }
}
