<?php

class User_model extends CI_Model
{
	private $_table = "tb_admin";
	private $_tableberita = "tb_berita";

	public $id_admin;
	public $username;
	public $password;
	public $role;

	public function rules()
	{
		return [
			[
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'required|min_length[3]|alpha|is_unique[tb_admin.username]',
				"errors" => [
					'min_length'=>'{field} Minimal 3 Karakter !',
					'alpha'=>'{field} Hanya Huruf Saja !',
					'is_unique'=>'{field} Ini Sudah Ada !'
				]
			],
			[
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required|min_length[8]',
				"errors" => [
					'min_length'=>'{field} Minimal 8 Karakter !'
				]
			]
		];
	}

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["id_admin" => $id])->result();
	}

	public function save()
	{
		$post = $this->input->post();
		$this->username = $post["username"];
		$this->password = password_hash($post["password"], PASSWORD_DEFAULT);
		$this->role = $post["role"] ?? "admin";
		$this->db->insert($this->_table, $this);
		$this->session->set_flashdata('berhasilditambah', 'Data Admin Berhasil Ditambahkan');
		redirect(site_url('user'));
	}

	public function update()
	{
		$post = $this->input->post();
		$this->id_admin = $post["id"];
		$this->username = $post["username"];
		$this->password = $post["password"];
		$this->role = $post["role"];
		$this->db->update($this->_table, $this, array('id_admin' => $post['id']));
		$this->session->set_flashdata('berhasildiubah', 'Data Admin Berhasil Diupdate');
		redirect(site_url('user'));
	}

	public function delete($id_admin)
	{
		$this->db->select('*');
		$this->db->from('tb_berita');
		$this->db->like('id_admin', $id_admin);
		$cekadmin = $this->db->count_all_results();

		if ($cekadmin > 0) {
			$this->session->set_flashdata('tidakdapatdihapus', '<strong>Gagal !!!</strong> Data Admin telah digunakan pada Data Berita, silahkan hapus Data Berita terlebih dahulu');
		} else {
			$del = $this->db->delete($this->_table, array('id_admin' => $id_admin));
			if ($del) {
				$this->session->set_flashdata('berhasildihapus', 'Data Admin Berhasil Dihapus');
				redirect(site_url('user'));
			} else {
				$this->session->set_flashdata('gagaldihapus', 'Data Admin Gagal Dihapus');
				redirect(site_url('user'));
			}
		}

		redirect(site_url('user'));
	}

	public function doLogin()
	{
		$post = $this->input->post();

		$this->db->where(['username' => $post["username"]]);
		$username = $this->username = $post["username"];
		$user = $this->db->get($this->_table)->row();

		if ($user) {
			$isPasswordTrue = password_verify($post["password"], $user->password);
			$isAdmin = $user->role == "admin";
			if ($isPasswordTrue && $isAdmin) {
				$this->session->set_userdata(['user_logged' => $user, 'username' => $username]);
				$this->_updateLastLogin($user->id_admin);
				return true;
			}
		}
		$this->session->set_flashdata('error', 'Username atau Password Anda Salah !!!');
		return false;
	}

	public function isNotLogin()
	{
		return $this->session->userdata('user_logged') === null;
	}

	private function _updateLastLogin($id_admin)
	{
		$sql = "UPDATE {$this->_table} SET terakhir_login=now() WHERE id_admin={$id_admin}";
		$this->db->query($sql);
		$new_data_session = array(
			'id_admin' => $id_admin);
		$this->session->set_userdata($new_data_session);
	}
}