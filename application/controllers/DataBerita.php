<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DataBerita extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('databerita_model');
		$this->load->library('form_validation');
		$this->load->model('user_model');
		if ($this->user_model->isNotLogin()) redirect(site_url('login'));
	}

	public function index()
	{
		$data["DataBerita"] = $this->databerita_model->getDataBerita();
		$this->load->view("admin/databerita/list", $data);
	}

	public function detail($id = NULL)
	{
		$data["DataBerita"] = $this->databerita_model->getDetail($id);
		$this->load->view("admin/databerita/detail", $data);
	}

	public function edit($id = NULL)
	{
		$this->form_validation->set_rules('judul', 'Judul', 'required');

		$data['DataBerita']  = $this->databerita_model->getById($id);

		if ($this->form_validation->run()) {
			$this->databerita_model->update();
		}
		$this->load->view("admin/databerita/edit_form", $data);
	}

	public function delete($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->databerita_model->delete($id)) {
			redirect(site_url('admin/databerita'));
		}
	}
}
