<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once( APPPATH.'controllers/AppBackend.php' );

class ModuleDashboard extends AppBackend
{
	function __construct() {
    parent::__construct();
    $this->load->model('../../dashboard/models/DashboardModel');
	}

	public function index() {
		$data = array(
      'app' => $this->app(),
      'main_js' => $this->load_main_js('moduleDashboard'),
      'card_title' => 'Module › Dashboard',
      'data' => json_decode($this->DashboardModel->getObject())
    );

		$this->template->set('title', 'Module Dashboard | ' . $data['app']->app_name, TRUE);
		$this->template->load_view('moduleDashboard/index', $data, TRUE);
		$this->template->render();
  }

  public function ajax_save() {
    $this->handle_ajax_request();

    $cpUpload = new CpUpload();
    $upload = $cpUpload->run('background_image', 'dashboard', true, true, 'jpg|jpeg|png|gif');
    $upload2 = $cpUpload->run('intro_image', 'dashboard', true, true, 'jpg|jpeg|png|gif');

    $_POST['background_image'] = '';
    $_POST['intro_image'] = '';

    if ($upload->status === true) {
      $_POST['background_image'] = $upload->data->base_path;
    };

    if ($upload2->status === true) {
      $_POST['intro_image'] = $upload2->data->base_path;
    };

    echo json_encode($this->DashboardModel->update());
  }
}
