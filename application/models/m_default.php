<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

class M_default extends CI_Model
{
	function ambilData($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	function get_data($table)
	{
		return $this->db->get($table);
	}

	function pengajuan($where)
	{
		$this->db->select('*');
		$this->db->join('kecamatan', 'kecamatan.id_kecamatan = pengajuan.id_kecamatan');
		$this->db->join('kelurahan', 'kelurahan.id_kelurahan = pengajuan.id_kelurahan');
		$this->db->join('kategori_tempat', 'kategori_tempat.id_tempat = pengajuan.id_tempat');
		return $this->db->get_where('pengajuan', $where);
	}

	function insert_data($data, $table)
	{
		$this->db->insert($table, $data);
	}

	function update_data($where, $table, $data)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	function delete_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	function insert_detail($where)
	{
		$sql = "INSERT INTO  detail_pinjam (id_pinjam,id_buku,denda) SELECT transaksi.id_pinjam, transaksi.id_buku, transaksi.denda FROM transaksi WHERE transaksi.id_anggota='$where' ";
		$this->db->query($sql);
	}

	function find($where, $table)
	{
		//query mencari record berdasarkan id nya
		$hasil = $this->db->where('id_buku', $where)
			->limit(1)
			->get($table);
		if ($hasil->num_rows() > 0) {
			return $hasil->row();
		} else {
			return array();
		}
	}

	public function kosongkan_data($table)
	{

		return $this->db->truncate($table);
	}

	public function kode_otomatis()
	{
		$this->db->select('right(id_user,3) as kode', false);
		$this->db->order_by('id_user', 'desc');
		$this->db->limit(1);
		$query = $this->db->get('user');

		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			$kode = 1;
		}

		$kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
		$kodejadi = "US" . $kodemax;

		return $kodejadi;

	}	
	public function kode_otomatis_pengajuan()
	{
		$this->db->select('right(id_pengajuan,3) as kode', false);
		$this->db->order_by('id_pengajuan', 'desc');
		$this->db->limit(1);
		$query = $this->db->get('pengajuan');

		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			$kode = 1;
		}

		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
		$kodejadi = "PJN" . $kodemax;

		return $kodejadi;
	}
}
