<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(APPPATH . 'controllers/App.php');

class Page extends App
{
	function __construct()
	{
		parent::__construct();
		$this->load->model(['PageModel', 'PageCommentModel']);
		$this->load->library(['form_validation']);
	}

	public function index()
	{
		redirect(base_url());
	}

	public function view($link = null)
	{
		$temp = $this->PageModel->getDetail('link', $link);

		if (count((array)$temp) > 0) {
			$data = array(
				'app' => $this->app(),
				'data' => $temp,
				'comments' => $this->PageCommentModel->getAll(['page_id' => $temp->id], 'id asc'),
			);
			if ($this->PageModel->updateVisitCount($link)) {
				$this->template->set('title', $data['data']->title . ' | ' . $data['app']->app_name, TRUE);
				$this->template->load_view($data['app']->template_frontend . '/detail', $data, TRUE);
				$this->template->render();
			} else {
				redirect(base_url());
			};
		} else {
			redirect(base_url());
		};
	}

	public function post_comment($id = null)
	{
		$this->handle_ajax_request();
		$this->form_validation->set_rules($this->PageCommentModel->rules());

		$isLogin = (!is_null($this->session->userdata('user')) && $this->session->userdata('user')['is_login'] == 1) ? true : false;

		if ($isLogin) {
			$_POST['author_name'] = '__admin__' . $this->session->userdata('user')['user_id'];
			$_POST['author_email'] = '__admin__' . $this->session->userdata('user')['user_id'] . '@dummy.admin';
			$_POST['author_photo'] = $this->session->userdata('user')['profile_photo'];
		} else {
			$_POST['author_photo'] = null;
		};

		$_POST['page_id'] = $id;

		if ($this->form_validation->run() === true) {
			echo json_encode($this->PageCommentModel->insert());
		} else {
			$errors = validation_errors('<div>- ', '</div>');
			echo json_encode(array('status' => false, 'data' => $errors));
		};
	}

	public function delete_comment($id = null)
	{
		$this->handle_ajax_request();
		echo json_encode($this->PageCommentModel->delete($id));
	}
}
