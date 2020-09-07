<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AppBackend extends MX_Controller
{
	function __construct() {
        parent::__construct();
        $this->handle_access();
        $this->load->model('SettingModel');
        $this->load->library('form_validation');
        $this->template->set_template($this->app()->template_backend);
	}

	public function app() {
        $appData = $this->SettingModel->getAll();
        $config = array();
        
        if (count($appData) > 0) {
            foreach ($appData as $index => $item) {
                $config[$item->data] = $item->content;
            };
        };
        
        return (object) $config;
    }

	public function load_main_js($folderName) {
        ob_start();
		include FCPATH.'application/modules/panel/views/'.$folderName.'/main.js.php';
		return ob_get_clean();
		ob_end_clean();
    }
    
    public function handle_ajax_request() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        };
    }

    public function handle_access() {
        $session = $this->session->userdata('user');
        $isLogin = (!is_null($session) && $session['is_login'] === true) ? true : false;

        if ($isLogin === false) {
            if ($this->router->fetch_class() != 'login') {
                redirect(base_url('panel/login/'));
            };
        } else {
            if ($this->router->fetch_class() == 'login') {
                redirect(base_url('panel/'));
            };
        };
    }
}
