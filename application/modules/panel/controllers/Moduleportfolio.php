<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once( APPPATH.'controllers/AppBackend.php' );

class ModulePortfolio extends AppBackend
{
	function __construct() {
    parent::__construct();
    $this->load->model([
      'AppModel',
      '../../portfolio/models/PortfolioModel',
      '../../portfolio/models/PortfolioTagModel'
    ]);
    $this->load->library('form_validation');
	}

	public function index() {
		$data = array(
      'app' => $this->app(),
      'main_js' => $this->load_main_js('modulePortfolio'),
      'card_title' => 'Module › Portfolio',
      'data_portfolio_tag' => $this->PortfolioTagModel->getAll()
		);
		$this->template->set('title', 'Module Portfolio | ' . $data['app']->app_name, TRUE);
		$this->template->load_view('modulePortfolio/index', $data, TRUE);
		$this->template->render();
  }
  
  public function ajax_getAll() {
    $this->handle_ajax_request();
		$dtAjax_config = array(
      'table_name' => 'view_portfolio',
      'order_column' => 4,
      'order_direction' => 'desc'
		);
    $response = $this->AppModel->getData_dtAjax( $dtAjax_config );
		echo json_encode( $response );
  }

  public function ajax_save($id = null) {
    $this->handle_ajax_request();
    $this->form_validation->set_rules($this->PortfolioModel->rules());

    if ($this->form_validation->run() === true) {
      $cpUpload = new CpUpload();
      $upload = $cpUpload->run('image', 'portfolio', true, true, 'jpg|png|gif');

      if (is_null($id)) {
        // Insert
        if ($upload->status === true) {
          $_POST['image'] = $upload->data->base_path;
          echo json_encode($this->PortfolioModel->insert());
        } else {
          echo json_encode(array('status' => false, 'data' => $upload->data));
        };
      } else {
        // Update
        $_POST['image'] = '';
        if ($upload->status === true) {
          $_POST['image'] = $upload->data->base_path;
        };
        echo json_encode($this->PortfolioModel->update($id));
      };
    } else {
      $errors = validation_errors('<div>- ', '</div>');
      echo json_encode(array('status' => false, 'data' => $errors));
    };
  }

  public function ajax_delete($id) {
    $this->handle_ajax_request();
    echo json_encode($this->PortfolioModel->delete($id));
  }

  // Tag
  public function tag() {
		$data = array(
      'app' => $this->app(),
      'main_js' => $this->load_main_js('modulePortfolio/tag'),
      'card_title' => 'Module › Portfolio › Tag',
		);
		$this->template->set('title', 'Module Portfolio Tag | ' . $data['app']->app_name, TRUE);
		$this->template->load_view('modulePortfolio/tag/index', $data, TRUE);
		$this->template->render();
  }
  
  public function ajax_getAll_tag() {
    $this->handle_ajax_request();
		$dtAjax_config = array(
      'table_name' => 'portfolio_tag',
      'order_column' => 1
		);
    $response = $this->AppModel->getData_dtAjax( $dtAjax_config );
		echo json_encode( $response );
  }

  public function ajax_save_tag($id = null) {
    $this->handle_ajax_request();
    $this->form_validation->set_rules($this->PortfolioTagModel->rules());

    if ($this->form_validation->run() === true) {
      if (is_null($id)) {
        // Insert
        echo json_encode($this->PortfolioTagModel->insert());
      } else {
        // Update
        echo json_encode($this->PortfolioTagModel->update($id));
      };
    } else {
      $errors = validation_errors('<div>- ', '</div>');
      echo json_encode(array('status' => false, 'data' => $errors));
    };
  }

  public function ajax_delete_tag($id) {
    $this->handle_ajax_request();
    echo json_encode($this->PortfolioTagModel->delete($id));
  }
  // END ## Tag
}
