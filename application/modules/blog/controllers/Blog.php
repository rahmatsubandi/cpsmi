<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once( APPPATH.'controllers/App.php' );

class Blog extends App
{
	function __construct() {
		parent::__construct();
		$this->load->model(['BlogModel', 'BlogCommentModel']);
		$this->load->library(['pagination', 'form_validation']);
	}

	public function index() {
		$pagination = $this->setPagination();
		$data = array(
			'app' => $this->app(),
			'data' => $this->BlogModel->getAll([], $pagination->config->per_page, $pagination->offset),
			'pagination' => $pagination->link
		);

		$this->template->set('title', $data['app']->active_module->name . ' | ' . $data['app']->app_name, TRUE);
		$this->template->load_view($data['app']->template_frontend.'/index', $data, TRUE);
		$this->template->render();
	}

	public function view($link = null) {
		$temp = $this->BlogModel->getDetail('link', $link);
		
		if (count($temp) == 1) {
			$data = array(
				'app' => $this->app(),
				'data' => $temp,
				'comments' => $this->BlogCommentModel->getAll(['blog_id' => $temp->id], 'id asc'),
				'data_latest' => $this->BlogModel->getLatest(6)
			);
			$this->BlogModel->updateVisitCount($link);
			$this->template->set('title', $data['data']->title . ' | ' . $data['app']->app_name, TRUE);
			$this->template->load_view($data['app']->template_frontend.'/detail', $data, TRUE);
			$this->template->render();
		} else {
			redirect(base_url('blog/'));
		};
	}

	private function setPagination() {
		$pagination = array(
			'per_page' => 12,
			'base_url' => base_url('blog/'),
			'total_rows' => $this->BlogModel->getRowCount(),
			'use_page_numbers' => true,
			'page_query_string' => true,
			'query_string_segment' => 'page',
			'first_link' => 'First',
			'last_link' => 'Last',
			'next_link' => 'Next',
			'prev_link' => 'Prev',
			'full_tag_open' => '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">',
			'full_tag_close' => '</ul></nav></div>',
			'num_tag_open' => '<li class="page-item"><span class="page-link">',
			'num_tag_close' => '</span></li>',
			'cur_tag_open' => '<li class="page-item active"><span class="page-link">',
			'cur_tag_close' => '<span class="sr-only">(current)</span></span></li>',
			'next_tag_open' => '<li class="page-item"><span class="page-link">',
			'next_tagl_close' => '<span aria-hidden="true">&raquo;</span></span></li>',
			'prev_tag_open' => '<li class="page-item"><span class="page-link">',
			'prev_tagl_close' => '</span>Next</li>',
			'first_tag_open' => '<li class="page-item"><span class="page-link">',
			'first_tagl_close' => '</span></li>',
			'last_tag_open' => '<li class="page-item"><span class="page-link">',
			'last_tagl_close' => '</span></li>'
		);
		
		$page = (isset($_GET['page']) && $_GET['page'] > 1) ? (int)($_GET['page']) : 1;
		$offset = ($page > 1) ? ($page * $pagination['per_page']) - $pagination['per_page'] : 0;
		$config = array(
			'config' => (object)$pagination,
			'page' => $page,
			'offset' => $offset
		);

		$this->pagination->initialize($pagination);

		$link = array('link' => $this->pagination->create_links());
		$response = array_merge($config, $link);

		return (object)$response;
	}

	public function post_comment($id = null) {
		$this->handle_ajax_request();
		$this->form_validation->set_rules($this->BlogCommentModel->rules());

		$isLogin = (!is_null($this->session->userdata('user')) && $this->session->userdata('user')['is_login'] == 1) ? true : false;

		if ($isLogin) {
			$_POST['author_name'] = '__admin__'.$this->session->userdata('user')['user_id'];
			$_POST['author_email'] = '__admin__'.$this->session->userdata('user')['user_id'].'@dummy.admin';
			$_POST['author_photo'] = $this->session->userdata('user')['profile_photo'];
		} else {
			$_POST['author_photo'] = null;
		};

		$_POST['blog_id'] = $id;

		if ($this->form_validation->run() === true) {
			echo json_encode($this->BlogCommentModel->insert());
		} else {
			$errors = validation_errors('<div>- ', '</div>');
			echo json_encode(array('status' => false, 'data' => $errors));
		};
  }

	public function delete_comment($id = null) {
		$this->handle_ajax_request();
		echo json_encode($this->BlogCommentModel->delete($id));
  }
}
