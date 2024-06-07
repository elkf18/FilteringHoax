<?php

class Validasi_model extends CI_Model
{
	private $_table = "tb_berita";

	public $id_berita;
	public $judul;
	public $kategori;
	public $gambar;
	public $isi;
	public $tgl_filtering;

	public function rules()
	{
		return [
			[
				'field' => 'judul',
				'label' => 'Judul',
				'rules' => 'required'
			],

			[
				'field' => 'isi',
				'label' => 'Isi',
				'rules' => 'required'
			]
		];
	}

	public function getAll()
	{
		$this->db->select('*');
		$this->db->from('tb_berita');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_berita.id_kategori', 'left');
		$this->db->where('id_status', '1');
		$this->db->order_by('tgl_filtering', 'desc');
		return $this->db->get()->result();
	}

	public function getDetail($id)
	{
		return $this->db->get_where($this->_table, ["id_berita" => $id])->result();
	}

	public function validasi($id, $id_admin)
	{
		$sql = "UPDATE {$this->_table} SET tgl_validasi=now(), id_status ='2', id_admin = $id_admin WHERE id_berita=$id";
		return $this->db->query($sql);
		redirect(site_url('validasi'));
	}
}