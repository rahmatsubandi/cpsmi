<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once( APPPATH.'controllers/AppBackend.php' );

class ModuleTestimonial extends AppBackend
{
	function __construct() {
    parent::__construct();
    $this->load->model([
      'AppModel',
      '../../testimonial/models/TestimonialModel'
    ]);
    $this->load->library('form_validation');
	}

	public function index() {
		$data = array(
      'app' => $this->app(),
      'main_js' => $this->load_main_js('moduleTestimonial'),
			'card_title' => 'Module › Testimonial'
		);
		$this->template->set('title', 'Module Testimonial | ' . $data['app']->app_name, TRUE);
		$this->template->load_view('moduleTestimonial/index', $data, TRUE);
		$this->template->render();
  }
  
  public function ajax_getAll() {
    $this->handle_ajax_request();
		$dtAjax_config = array(
      'table_name' => 'testimonial',
      'order_column' => 4,
      'order_direction' => 'desc'
		);
    $response = $this->AppModel->getData_dtAjax( $dtAjax_config );
		echo json_encode( $response );
  }

  public function ajax_save($id = null) {
    $this->handle_ajax_request();
    $this->form_validation->set_rules($this->TestimonialModel->rules());

    if ($this->form_validation->run() === true) {
      // Upload File
      $_POST['creator_photo'] = '';
      $_POST['screenshot'] = '';

      $cpUpload = new CpUpload();
      
      if (isset($_FILES['creator_photo']) && !empty($_FILES['creator_photo']['name'])) {
        $upload1 = $cpUpload->run('creator_photo', 'testimonial', true, true, 'jpg|jpeg|png|gif');
        if ($upload1->status === true) {
          $_POST['creator_photo'] = $upload1->data->base_path;
        } else {
          echo json_encode(array('status' => false, 'data' => 'Creator Photo : '.$upload1->data));
          die;
        };
      } else {
        if (is_null($id)) {
          echo json_encode(array('status' => false, 'data' => 'The Creator Photo field is required.'));
          die;
        };
      };

      if (isset($_FILES['screenshot']) && !empty($_FILES['screenshot']['name'])) {
        $upload2 = $cpUpload->run('screenshot', 'testimonial', true, true, 'jpg|jpeg|png|gif');
        if ($upload2->status === true) {
          $_POST['screenshot'] = $upload2->data->base_path;
        } else {
          echo json_encode(array('status' => false, 'data' => 'Screenshot : '.$upload2->data));
          die;
        };
      };
      // END ## Upload File

      if (is_null($id)) {
        // Insert
        echo json_encode($this->TestimonialModel->insert());
      } else {
        // Update
        echo json_encode($this->TestimonialModel->update($id));
      };
    } else {
      $errors = validation_errors('<div>- ', '</div>');
      echo json_encode(array('status' => false, 'data' => $errors));
    };
  }

  public function ajax_delete($id) {
    $this->handle_ajax_request();
    echo json_encode($this->TestimonialModel->delete($id));
  }
}
