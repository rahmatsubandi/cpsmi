<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once( APPPATH.'controllers/AppBackend.php' );

class ModuleProduct extends AppBackend
{
	function __construct() {
    parent::__construct();
    $this->load->model([
      'AppModel',
      'ProvincesModel',
      'RegenciesModel',
      '../../product/models/ProductModel',
      '../../product/models/ProductCategoryModel'
    ]);
    $this->load->library('form_validation');
	}

	public function index() {
		$data = array(
      'app' => $this->app(),
      'main_js' => $this->load_main_js('moduleProduct'),
      'card_title' => 'Module › Product',
		);
		$this->template->set('title', 'Module Product | ' . $data['app']->app_name, TRUE);
		$this->template->load_view('moduleProduct/index', $data, TRUE);
		$this->template->render();
  }

	public function create() {
		$data = array(
      'app' => $this->app(),
      'main_js' => $this->load_main_js('moduleProduct'),
      'card_title' => 'Module › Product: Create',
      'data_category' => $this->ProductCategoryModel->getAll(),
      'data_provinces' => $this->ProvincesModel->getAll()
		);
		$this->template->set('title', 'Module Product: Create | ' . $data['app']->app_name, TRUE);
		$this->template->load_view('moduleProduct/form', $data, TRUE);
		$this->template->render();
  }

	public function update($id) {
    $temp = $this->ProductModel->getDetail('id', $id);
		$data = array(
      'app' => $this->app(),
      'main_js' => $this->load_main_js('moduleProduct'),
      'card_title' => 'Module › Product: Update',
      'data' => $temp,
      'data_category' => $this->ProductCategoryModel->getAll(),
      'data_provinces' => $this->ProvincesModel->getAll(),
      'data_regencies' => $this->RegenciesModel->getFilter('province_id', $temp->province_id)
		);
		$this->template->set('title', 'Module Product: Update | ' . $data['app']->app_name, TRUE);
		$this->template->load_view('moduleProduct/form', $data, TRUE);
		$this->template->render();
  }
  
  public function ajax_getAll() {
    $this->handle_ajax_request();
		$dtAjax_config = array(
      'table_name' => 'view_product',
      'order_column' => 6,
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
    $this->form_validation->set_rules($this->ProductModel->rules());

    if ($this->form_validation->run() === true) {
      // Upload File
      $_POST['image1'] = '';
      $_POST['image2'] = '';
      $_POST['image3'] = '';
      $_POST['image4'] = '';

      $cpUpload = new CpUpload();
      
      if (isset($_FILES['image1']) && !empty($_FILES['image1']['name'])) {
        $upload1 = $cpUpload->run('image1', 'product', true, true, 'jpg|jpeg|png|gif');
        if ($upload1->status === true) {
          $_POST['image1'] = $upload1->data->base_path;
        } else {
          echo json_encode(array('status' => false, 'data' => 'Image 1 : '.$upload1->data));
          die;
        };
      } else {
        if (empty($_POST['id'])) {
          echo json_encode(array('status' => false, 'data' => 'The Image 1 field is required.'));
          die;
        };
      };

      if (isset($_FILES['image2']) && !empty($_FILES['image2']['name'])) {
        $upload2 = $cpUpload->run('image2', 'product', true, true, 'jpg|jpeg|png|gif');
        if ($upload2->status === true) {
          $_POST['image2'] = $upload2->data->base_path;
        } else {
          echo json_encode(array('status' => false, 'data' => 'Image 2 : '.$upload2->data));
          die;
        };
      };

      if (isset($_FILES['image3']) && !empty($_FILES['image3']['name'])) {
        $upload3 = $cpUpload->run('image3', 'product', true, true, 'jpg|jpeg|png|gif');
        if ($upload3->status === true) {
          $_POST['image3'] = $upload3->data->base_path;
        } else {
          echo json_encode(array('status' => false, 'data' => 'Image 3 : '.$upload3->data));
          die;
        };
      };

      if (isset($_FILES['image4']) && !empty($_FILES['image4']['name'])) {
        $upload4 = $cpUpload->run('image4', 'product', true, true, 'jpg|jpeg|png|gif');
        if ($upload4->status === true) {
          $_POST['image4'] = $upload4->data->base_path;
        } else {
          echo json_encode(array('status' => false, 'data' => 'Image 4 : '.$upload4->data));
          die;
        };
      };
      // END ## Upload File

      if (empty($_POST['id'])) {
        // Insert
        echo json_encode($this->ProductModel->insert());
      } else {
        // Update
        echo json_encode($this->ProductModel->update($_POST['id']));
      };
    } else {
      $errors = validation_errors('<div>- ', '</div>');
      echo json_encode(array('status' => false, 'data' => $errors));
    };
  }

  public function ajax_delete($id) {
    $this->handle_ajax_request();
    echo json_encode($this->ProductModel->delete($id));
  }
  
  // Category
  public function category() {
		$data = array(
      'app' => $this->app(),
      'main_js' => $this->load_main_js('moduleProduct/category'),
      'card_title' => 'Module › Product › Category',
		);
		$this->template->set('title', 'Module Product Category | ' . $data['app']->app_name, TRUE);
		$this->template->load_view('moduleProduct/category/index', $data, TRUE);
		$this->template->render();
  }
  
  public function ajax_getAll_category() {
    $this->handle_ajax_request();
		$dtAjax_config = array(
      'table_name' => 'product_category',
      'order_column' => 1
		);
    $response = $this->AppModel->getData_dtAjax( $dtAjax_config );
		echo json_encode( $response );
  }

  public function ajax_save_category($id = null) {
    $this->handle_ajax_request();
    $this->form_validation->set_rules($this->ProductCategoryModel->rules());

    if ($this->form_validation->run() === true) {
      if (is_null($id)) {
        // Insert
        echo json_encode($this->ProductCategoryModel->insert());
      } else {
        // Update
        echo json_encode($this->ProductCategoryModel->update($id));
      };
    } else {
      $errors = validation_errors('<div>- ', '</div>');
      echo json_encode(array('status' => false, 'data' => $errors));
    };
  }

  public function ajax_delete_category($id) {
    $this->handle_ajax_request();
    echo json_encode($this->ProductCategoryModel->delete($id));
  }
  // END ## Category
}
