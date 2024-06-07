<?php

defined("BASEPATH") or exit("No direct script access allowed");

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("home_model");
		$this->load->library("form_validation");
	}

	public function index()
	{
		$data["Home"] = $this->home_model->getDataBerita();
		$this->load->view("guest/home", $data);
	}

	public function detail($id = null)
	{
		$data["Home"] = $this->home_model->getDetail($id);
		$data["Homee"] = $this->home_model->getListBerita();
		$this->load->view("guest/detail", $data);
	}
}
