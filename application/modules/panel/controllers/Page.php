<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once( APPPATH.'controllers/AppBackend.php' );

class Page extends AppBackend
{
	function __construct() {
    parent::__construct();
    $this->load->model([
      'AppModel',
      '../../page/models/PageModel'
    ]);
    $this->load->library('form_validation');
	}

	public function index() {
		$data = array(
      'app' => $this->app(),
      'main_js' => $this->load_main_js('page'),
      'card_title' => 'Module › Page',
		);
		$this->template->set('title', 'Module Page | ' . $data['app']->app_name, TRUE);
		$this->template->load_view('page/index', $data, TRUE);
		$this->template->render();
  }

	public function create() {
		$data = array(
      'app' => $this->app(),
      'main_js' => $this->load_main_js('page'),
      'card_title' => 'Module › Page: Create'
		);
		$this->template->set('title', 'Module Page: Create | ' . $data['app']->app_name, TRUE);
		$this->template->load_view('page/form', $data, TRUE);
		$this->template->render();
  }

	public function update($id) {
		$data = array(
      'app' => $this->app(),
      'main_js' => $this->load_main_js('page'),
      'card_title' => 'Module › Page: Update',
      'data' => $this->PageModel->getDetail('id', $id)
		);
		$this->template->set('title', 'Module Page: Update | ' . $data['app']->app_name, TRUE);
		$this->template->load_view('page/form', $data, TRUE);
		$this->template->render();
  }
  
  public function ajax_getAll() {
    $this->handle_ajax_request();
		$dtAjax_config = array(
      'table_name' => 'view_page',
      'order_column' => 5,
      'order_direction' => 'desc'
		);
    $response = $this->AppModel->getData_dtAjax( $dtAjax_config );
		echo json_encode( $response );
  }

  public function ajax_save() {
    $this->handle_ajax_request();
    $this->form_validation->set_rules($this->PageModel->rules());

    if ($this->form_validation->run() === true) {
      // Upload File
      $_POST['cover'] = '';

      $cpUpload = new CpUpload();

      if (isset($_FILES['cover']) && !empty($_FILES['cover']['name'])) {
        $upload = $cpUpload->run('cover', 'page', true, true, 'jpg|jpeg|png|gif');
        if ($upload->status === true) {
          $_POST['cover'] = $upload->data->base_path;
        } else {
          echo json_encode(array('status' => false, 'data' => 'Cover : '.$upload->data));
          die;
        };
      };
      // END ## Upload File

      if (empty($_POST['id'])) {
        // Insert
        echo json_encode($this->PageModel->insert());
      } else {
        // Update
        echo json_encode($this->PageModel->update($_POST['id']));
      };
    } else {
      $errors = validation_errors('<div>- ', '</div>');
      echo json_encode(array('status' => false, 'data' => $errors));
    };
  }

  public function ajax_delete($id) {
    $this->handle_ajax_request();
    echo json_encode($this->PageModel->delete($id));
  }
}
