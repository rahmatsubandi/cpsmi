<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once( APPPATH.'controllers/AppBackend.php' );

class Search extends AppBackend
{
	function __construct() {
    parent::__construct();
    $this->load->model([
      'AppModel',
      '../../blog/models/BlogModel',
      '../../page/models/PageModel'
    ]);
  }
  
  public function index() {
    $get = $this->input->get();

    if (isset($get['q']) && !empty($get['q'])) {
      $q = $get['q'];
      $data = array(
        'app' => $this->app(),
        'main_js' => $this->load_main_js('search'),
        'blogs' => $this->BlogModel->search($q),
        'pages' => $this->PageModel->search($q),
        'card_title' => 'Search : ' . $q,
        'keyword' => $q
      );
      $this->template->set('title', $q . ' - Search | ' . $data['app']->app_name, TRUE);
      $this->template->load_view('search/index', $data, TRUE);
      $this->template->render();
    } else {
      redirect(base_url('panel/'));
    };
  }

  public function q() {
    $post = $this->input->post();

    if (isset($post['app_search']) && !empty($post['app_search'])) {
      redirect(base_url('panel/search?q=' . $post['app_search']));
    } else {
      redirect(base_url('panel/'));
    };
  }
}
