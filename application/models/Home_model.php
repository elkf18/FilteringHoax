<?php

class Home_model extends CI_Model
{
	private $_table = "tb_berita";

	public function getDataBerita()
	{
		$this->db->select('*');
		$this->db->from('tb_berita');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_berita.id_kategori', 'left');
		$this->db->where('id_status', '2');
		$this->db->order_by('tgl_berita', 'desc');
		return $this->db->get()->result();
	}
	
	public function getDetail($id)
	{
		return $this->db->get_where($this->_table, ["id_berita" => $id])->result();
	}

	public function getListBerita()
	{
		$this->db->select('*');
		$this->db->from('tb_berita');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_berita.id_kategori', 'left');
		$this->db->where('id_status', '2');
		$this->db->order_by('tgl_berita', 'desc');
		$this->db->limit(3);
		return $this->db->get()->result();
	}
}