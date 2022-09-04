<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(APPPATH . 'controllers/AppBackend.php');

class Login extends AppBackend
{
  function __construct()
  {
    parent::__construct();
    $this->load->model(['LoginModel']);
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data = array(
      'app' => $this->app(),
      'main_js' => $this->load_main_js('login'),
      'page_title' => 'Login | ' . $this->app()->app_name
    );
    $this->load->view('login/index', $data);
  }

  public function ajax_submit()
  {
    $this->handle_ajax_request();
    $this->form_validation->set_rules($this->LoginModel->rules());

    if ($this->form_validation->run() === true) {
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $temp = $this->LoginModel->getDetail(['username' => $username, 'password' => md5($password), 'is_active' => '1']);

      if ($temp) {
        $user = array(
          'user_id' => $temp->id,
          'username' => $temp->username,
          'full_name' => $temp->full_name,
          'profile_photo' => $temp->profile_photo,
          'is_login' => true
        );
        $this->session->set_userdata('user', $user);

        echo json_encode(array('status' => true, 'data' => 'Successfully login.'));
      } else {
        echo json_encode(array('status' => false, 'data' => 'Username or Password is wrong, try again.'));
      };
    } else {
      $errors = validation_errors('<div>- ', '</div>');
      echo json_encode(array('status' => false, 'data' => $errors));
    };
  }
}
