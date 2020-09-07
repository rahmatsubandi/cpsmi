<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once( APPPATH.'controllers/AppBackend.php' );

class Setting extends AppBackend
{
	function __construct() {
    parent::__construct();
    $this->load->model([
      'AppModel',
      'SettingAccountModel',
      'SettingUserModel',
      'SettingAppModel',
      'SettingSmtpModel',
      'SettingModuleModel'
    ]);
    $this->load->library('form_validation');
	}

	public function index() {
		redirect(base_url('panel/setting/application'));
  }

  // Account
  public function account() {
    $data = array(
      'app' => $this->app(),
      'main_js' => $this->load_main_js('setting/account'),
			'card_title' => 'Setting › Change Password'
    );
		$this->template->set('title', 'Change Password | ' . $data['app']->app_name, TRUE);
		$this->template->load_view('setting/account/index', $data, TRUE);
		$this->template->render();
  }

  public function ajax_save_account() {
    $this->handle_ajax_request();
    $this->form_validation->set_rules($this->SettingAccountModel->rules());

    if ($this->form_validation->run() === true) {
      echo json_encode($this->SettingAccountModel->updatePassword());
    } else {
      $errors = validation_errors('<div>- ', '</div>');
      echo json_encode(array('status' => false, 'data' => $errors));
    };
  }
  // END ## Account

  // User
  public function user() {
    $data = array(
      'app' => $this->app(),
      'main_js' => $this->load_main_js('setting/user'),
			'card_title' => 'Setting › User'
    );
		$this->template->set('title', 'Setting User | ' . $data['app']->app_name, TRUE);
		$this->template->load_view('setting/user/index', $data, TRUE);
		$this->template->render();
  }
  
  public function ajax_getAll_user() {
    $this->handle_ajax_request();
		$dtAjax_config = array(
      'table_name' => 'user',
      'order_column' => 5,
      'order_direction' => 'desc'
		);
    $response = $this->AppModel->getData_dtAjax( $dtAjax_config );
		echo json_encode( $response );
  }

  public function ajax_save_user($id = null) {
    $this->handle_ajax_request();
    $this->rules = (is_null($id)) ? $this->SettingUserModel->rulesInsert() : $this->SettingUserModel->rulesUpdate();
    $this->form_validation->set_rules($this->rules);

    if ($this->form_validation->run() === true) {
      // Upload File
      $_POST['profile_photo'] = '';

      $cpUpload = new CpUpload();
      
      if (isset($_FILES['profile_photo']) && !empty($_FILES['profile_photo']['name'])) {
        $upload1 = $cpUpload->run('profile_photo', 'user', true, true, 'jpg|jpeg|png|gif');
        if ($upload1->status === true) {
          $_POST['profile_photo'] = $upload1->data->base_path;
        } else {
          echo json_encode(array('status' => false, 'data' => 'Profile Photo : '.$upload1->data));
          die;
        };
      };
      // END ## Upload File

      if (is_null($id)) {
        // Insert
        echo json_encode($this->SettingUserModel->insert());
      } else {
        // Update
        echo json_encode($this->SettingUserModel->update($id));
      };
    } else {
      $errors = validation_errors('<div>- ', '</div>');
      echo json_encode(array('status' => false, 'data' => $errors));
    };
  }

  public function ajax_delete_user($id) {
    $this->handle_ajax_request();
    echo json_encode($this->SettingUserModel->delete($id));
  }
  // END ## User

  // Application
  public function application() {
    $data = array(
      'app' => $this->app(),
      'main_js' => $this->load_main_js('setting/application'),
			'card_title' => 'Setting › Application'
    );
		$this->template->set('title', 'Setting Application | ' . $data['app']->app_name, TRUE);
		$this->template->load_view('setting/application/index', $data, TRUE);
		$this->template->render();
  }

  public function ajax_save_application() {
    $this->handle_ajax_request();
    $this->form_validation->set_rules($this->SettingAppModel->rules());

    if ($this->form_validation->run() === true) {
      // Upload File
      $_POST['app_favicon'] = '';

      $cpUpload = new CpUpload();
      
      if (isset($_FILES['app_favicon']) && !empty($_FILES['app_favicon']['name'])) {
        $upload1 = $cpUpload->run('app_favicon', 'app', true, true, 'jpg|jpeg|png|gif|ico');
        if ($upload1->status === true) {
          $_POST['app_favicon'] = $upload1->data->base_path;
        } else {
          echo json_encode(array('status' => false, 'data' => 'Favicon : '.$upload1->data));
          die;
        };
      } else {
        $temp_favicon = $this->SettingAppModel->getDetail('data', 'app_favicon');
        if (empty($temp_favicon->content)) {
          echo json_encode(array('status' => false, 'data' => 'The Favicon field is required.'));
          die;
        };
      };
      // END ## Upload File

      echo json_encode($this->SettingAppModel->update());
    } else {
      $errors = validation_errors('<div>- ', '</div>');
      echo json_encode(array('status' => false, 'data' => $errors));
    };
  }
  // END ## Application

  // SMTP
  public function smtp() {
    $data = array(
      'app' => $this->app(),
      'main_js' => $this->load_main_js('setting/smtp'),
			'card_title' => 'Setting › SMTP'
    );
		$this->template->set('title', 'Setting SMTP | ' . $data['app']->app_name, TRUE);
		$this->template->load_view('setting/smtp/index', $data, TRUE);
		$this->template->render();
  }

  public function ajax_save_smtp() {
    $this->handle_ajax_request();
    $this->form_validation->set_rules($this->SettingSmtpModel->rules());

    if ($this->form_validation->run() === true) {
      echo json_encode($this->SettingSmtpModel->update());
    } else {
      $errors = validation_errors('<div>- ', '</div>');
      echo json_encode(array('status' => false, 'data' => $errors));
    };
  }
  // END ## SMTP

  // Module
  public function module() {
    $data = array(
      'app' => $this->app(),
      'main_js' => $this->load_main_js('setting/module'),
			'card_title' => 'Setting › Module'
    );
		$this->template->set('title', 'Setting Module | ' . $data['app']->app_name, TRUE);
		$this->template->load_view('setting/module/index', $data, TRUE);
		$this->template->render();
  }
  
  public function ajax_getAll_module() {
    $this->handle_ajax_request();
		$dtAjax_config = array(
      'table_name' => 'module',
      'order_column' => 5,
      'order_direction' => 'desc'
		);
    $response = $this->AppModel->getData_dtAjax( $dtAjax_config );
		echo json_encode( $response );
  }

  public function ajax_save_module($id = null) {
    $this->handle_ajax_request();
    $this->form_validation->set_rules($this->SettingModuleModel->rules());

    if ($this->form_validation->run() === true) {
      if (is_null($id)) {
        // Insert
        echo json_encode($this->SettingModuleModel->insert());
      } else {
        // Update
        echo json_encode($this->SettingModuleModel->update($id));
      };
    } else {
      $errors = validation_errors('<div>- ', '</div>');
      echo json_encode(array('status' => false, 'data' => $errors));
    };
  }

  public function ajax_delete_module($id) {
    $this->handle_ajax_request();
    echo json_encode($this->SettingModuleModel->delete($id));
  }
  // END ## Module
}
