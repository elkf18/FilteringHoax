<?php

header("Access-Control-Allow-Origin: *");
defined('BASEPATH') or exit('No direct script access allowed');

class SystemFiltering extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('session');
    $this->load->model('systemfiltering_model');
    $this->load->library('form_validation');
    $this->load->model('user_model');
    if ($this->user_model->isNotLogin()) redirect(site_url('login'));
  }

  public function index()
  {
    $this->load->view("admin/filtering/list");
  }
}