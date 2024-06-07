<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('databerita_model');
		$this->load->model('riwayat_model');
		$this->load->model('validasi_model');
		$this->load->model('user_model');
		$this->load->library('form_validation');
		if ($this->user_model->isNotLogin()) redirect(site_url('login'));
	}

	public function index()
	{
		$data["Riwayat"] = $this->riwayat_model->getRiwayat();
		$this->load->view("admin/riwayat/list", $data);
	}
}