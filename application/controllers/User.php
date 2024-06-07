<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('databerita_model');
		$this->load->library('form_validation');
		if ($this->user_model->isNotLogin()) redirect(site_url('login'));
	}

	public function index()
	{
		$data["User"] = $this->user_model->getAll();
		$this->load->view("admin/user/list", $data);
	}
	
	public function input( )
	{
		$this->form_validation->set_message('required', '{field}Kolom Wajib Diisi !');

		$user = $this->user_model;
		$validation = $this->form_validation;
		$validation->set_rules($user->rules());

		if ($validation->run()) {
			$user->save();
		}
		$this->load->view('admin/user/new_form');
	}

	public function edit($id = NULL)
	{
		$data['User']  = $this->user_model->getById($id);
		
		$user = $this->user_model;
		$validation = $this->form_validation;
		$validation->set_rules($user->rules());

		if ($validation->run() === FALSE) {
			$this->load->view("admin/user/edit_form", $data);
		} else {
			$user->update();
		}
	}

	public function delete($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->user_model->delete($id)) {
			redirect(site_url('admin/user'));
		}
	}

}
