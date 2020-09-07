<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once( APPPATH.'controllers/AppBackend.php' );

class ModuleBlog extends AppBackend
{
	function __construct() {
    parent::__construct();
    $this->load->model([
      'AppModel',
      '../../blog/models/BlogModel',
      '../../blog/models/BlogCategoryModel'
    ]);
    $this->load->library('form_validation');
	}

	public function index() {
		$data = array(
      'app' => $this->app(),
      'main_js' => $this->load_main_js('moduleBlog'),
      'card_title' => 'Module › Blog',
		);
		$this->template->set('title', 'Module Blog | ' . $data['app']->app_name, TRUE);
		$this->template->load_view('moduleBlog/index', $data, TRUE);
		$this->template->render();
  }

	public function create() {
		$data = array(
      'app' => $this->app(),
      'main_js' => $this->load_main_js('moduleBlog'),
      'card_title' => 'Module › Blog: Create',
      'data_category' => $this->BlogCategoryModel->getAll()
		);
		$this->template->set('title', 'Module Blog: Create | ' . $data['app']->app_name, TRUE);
		$this->template->load_view('moduleBlog/form', $data, TRUE);
		$this->template->render();
  }

	public function update($id) {
		$data = array(
      'app' => $this->app(),
      'main_js' => $this->load_main_js('moduleBlog'),
      'card_title' => 'Module › Blog: Update',
      'data' => $this->BlogModel->getDetail('id', $id),
      'data_category' => $this->BlogCategoryModel->getAll()
		);
		$this->template->set('title', 'Module Blog: Update | ' . $data['app']->app_name, TRUE);
		$this->template->load_view('moduleBlog/form', $data, TRUE);
		$this->template->render();
  }
  
  public function ajax_getAll() {
    $this->handle_ajax_request();
		$dtAjax_config = array(
      'table_name' => 'view_blog',
      'order_column' => 6,
      'order_direction' => 'desc'
		);
    $response = $this->AppModel->getData_dtAjax( $dtAjax_config );
		echo json_encode( $response );
  }

  public function ajax_save() {
    $this->handle_ajax_request();
    $this->form_validation->set_rules($this->BlogModel->rules());

    if ($this->form_validation->run() === true) {
      $cpUpload = new CpUpload();
      $upload = $cpUpload->run('cover', 'blog', true, true, 'jpg|png|gif');

      if (empty($_POST['id'])) {
        // Insert
        if ($upload->status === true) {
          $_POST['cover'] = $upload->data->base_path;
          echo json_encode($this->BlogModel->insert());
        } else {
          echo json_encode(array('status' => false, 'data' => $upload->data));
        };
      } else {
        // Update
        $_POST['cover'] = '';
        if ($upload->status === true) {
          $_POST['cover'] = $upload->data->base_path;
        };
        echo json_encode($this->BlogModel->update($_POST['id']));
      };
    } else {
      $errors = validation_errors('<div>- ', '</div>');
      echo json_encode(array('status' => false, 'data' => $errors));
    };
  }

  public function ajax_delete($id) {
    $this->handle_ajax_request();
    echo json_encode($this->BlogModel->delete($id));
  }

  // Category
  public function category() {
		$data = array(
      'app' => $this->app(),
      'main_js' => $this->load_main_js('moduleBlog/category'),
      'card_title' => 'Module › Blog › Category',
		);
		$this->template->set('title', 'Module Blog Category | ' . $data['app']->app_name, TRUE);
		$this->template->load_view('moduleBlog/category/index', $data, TRUE);
		$this->template->render();
  }
  
  public function ajax_getAll_category() {
    $this->handle_ajax_request();
		$dtAjax_config = array(
      'table_name' => 'blog_category',
      'order_column' => 1
		);
    $response = $this->AppModel->getData_dtAjax( $dtAjax_config );
		echo json_encode( $response );
  }

  public function ajax_save_category($id = null) {
    $this->handle_ajax_request();
    $this->form_validation->set_rules($this->BlogCategoryModel->rules());

    if ($this->form_validation->run() === true) {
      if (is_null($id)) {
        // Insert
        echo json_encode($this->BlogCategoryModel->insert());
      } else {
        // Update
        echo json_encode($this->BlogCategoryModel->update($id));
      };
    } else {
      $errors = validation_errors('<div>- ', '</div>');
      echo json_encode(array('status' => false, 'data' => $errors));
    };
  }

  public function ajax_delete_category($id) {
    $this->handle_ajax_request();
    echo json_encode($this->BlogCategoryModel->delete($id));
  }
  // END ## Category
}
