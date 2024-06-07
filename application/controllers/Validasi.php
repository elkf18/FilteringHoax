<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Validasi extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('session');
    $this->load->model('validasi_model');
    $this->load->library('form_validation');
    $this->load->model('user_model');
    if ($this->user_model->isNotLogin()) redirect(site_url('login'));
  }

  public function index()
  {
    $data["Validasi"] = $this->validasi_model->getAll();
    $this->load->view("admin/validasi/list", $data);
  }

  public function detail($id = NULL)
	{
		$data["Validasi"] = $this->validasi_model->getDetail($id);
		$this->load->view("admin/validasi/detail", $data);
	}

  public function get_session_data(){
    $this->session->all_userdata();
  }

  // untuk fungsi validasi
  public function validasi($id = null)
  {
    $id_admin = $this->session->userdata('id_admin');
    if ($this->validasi_model->validasi($id, $id_admin)) {
      $this->session->set_flashdata('success', 'Data Berita Berhasil Divalidasi');
      redirect(site_url('validasi'));
    }
  }
}
