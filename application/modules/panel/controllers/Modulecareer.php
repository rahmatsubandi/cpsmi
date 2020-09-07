<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once( APPPATH.'controllers/AppBackend.php' );

class ModuleCareer extends AppBackend
{
	function __construct() {
    parent::__construct();
    $this->load->model([
      'AppModel',
      'ProvincesModel',
      'RegenciesModel',
      '../../career/models/CareerModel'
    ]);
    $this->load->library('form_validation');
	}

	public function index() {
		$data = array(
      'app' => $this->app(),
      'main_js' => $this->load_main_js('moduleCareer'),
      'card_title' => 'Module › Career',
		);
		$this->template->set('title', 'Module Career | ' . $data['app']->app_name, TRUE);
		$this->template->load_view('moduleCareer/index', $data, TRUE);
		$this->template->render();
  }

	public function create() {
		$data = array(
      'app' => $this->app(),
      'main_js' => $this->load_main_js('moduleCareer'),
      'card_title' => 'Module › Career: Create',
      'data_provinces' => $this->ProvincesModel->getAll()
		);
		$this->template->set('title', 'Module Career: Create | ' . $data['app']->app_name, TRUE);
		$this->template->load_view('moduleCareer/form', $data, TRUE);
		$this->template->render();
  }

	public function update($id) {
    $temp = $this->CareerModel->getDetail('id', $id);
		$data = array(
      'app' => $this->app(),
      'main_js' => $this->load_main_js('moduleCareer'),
      'card_title' => 'Module › Career: Update',
      'data' => $temp,
      'data_provinces' => $this->ProvincesModel->getAll(),
      'data_regencies' => $this->RegenciesModel->getFilter('province_id', $temp->province_id)
		);
		$this->template->set('title', 'Module Career: Update | ' . $data['app']->app_name, TRUE);
		$this->template->load_view('moduleCareer/form', $data, TRUE);
		$this->template->render();
  }
  
  public function ajax_getAll() {
    $this->handle_ajax_request();
		$dtAjax_config = array(
      'table_name' => 'view_career',
      'order_column' => 5,
      'order_direction' => 'desc'
		);
    $response = $this->AppModel->getData_dtAjax( $dtAjax_config );
		echo json_encode( $response );
  }

  public function ajax_getRegencies($province_id) {
    $this->handle_ajax_request();
    echo json_encode($this->RegenciesModel->getFilter('province_id', $province_id));
  }

  public function ajax_save() {
    $this->handle_ajax_request();
    $this->form_validation->set_rules($this->CareerModel->rules());

    if ($this->form_validation->run() === true) {
      if (empty($_POST['id'])) {
        // Insert
        echo json_encode($this->CareerModel->insert());
      } else {
        // Update
        echo json_encode($this->CareerModel->update($_POST['id']));
      };
    } else {
      $errors = validation_errors('<div>- ', '</div>');
      echo json_encode(array('status' => false, 'data' => $errors));
    };
  }

  public function ajax_delete($id) {
    $this->handle_ajax_request();
    echo json_encode($this->CareerModel->delete($id));
  }
}
