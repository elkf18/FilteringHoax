<?php

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("user_model");
		$this->load->library('form_validation');
	}

	public function index()
	{
		check_already_login();
		if ($this->input->post()) {
			if ($this->user_model->doLogin()) {
				redirect(site_url('overview'));
			}
		}
		$this->load->view("admin/login_page.php");
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url('login'));
	}
}
