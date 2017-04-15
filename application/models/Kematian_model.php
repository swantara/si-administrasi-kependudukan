<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kematian_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function getkematian()
	{
		$query = $this->db->query('select k.*, 
			p.nama as nama_penduduk, p.nik as nik
			from t_kematian k 
			inner join t_penduduk p on p.id_penduduk=k.id_penduduk
			where k.status <> 0');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getdetailkematian($id)
	{
		$query = $this->db->query('select k.*, tp.nama as nama_penduduk from t_kematian k inner join t_penduduk tp on tp.id_penduduk=k.id_penduduk where k.id_kematian='.$id);

		if($query->num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function simpan()
	{
		//ambil data admin yang menginputkan data
		$data_session = $this->session->userdata('session');
		$id_user = 1; //$data_session['id_user'];
		$id_penduduk = $this -> input -> post('id_penduduk');

		$data = array(
		  'status_kependudukan' => '4',
		  'updated_by' => $id_user
		  );

		//insert ke database
		$this->db->where('id_penduduk', $id_penduduk);
		$this->db->update('t_penduduk', $data);
		
		$data = array(
		  'id_penduduk' => $this -> input -> post('id_penduduk'),
		  'tempat_meninggal' => $this -> input -> post('tempat_meninggal'),
		  'tgl_meninggal' => date('Y-m-d', strtotime($this -> input -> post('tanggal_meninggal'))),
		  'penyebab' => $this -> input -> post('penyebab'),
		  'keterangan' => $this -> input -> post('keterangan'),
		  'created_by' => $id_user
		  );

		//insert ke database
		$this->db->insert('t_kematian', $data);

		$this->session->set_flashdata('alert','save');
		return true;
	}

	public function edit($id)
	{
		//ambil data admin yang menginputkan data
		$data_session = $this->session->userdata('session');
		$id_user = $data_session['id_user'];

		$data = array(
		  'id_penduduk' => $this -> input -> post('id_penduduk'),
		  'tempat_meninggal' => $this -> input -> post('tempat_meninggal'),
		  'tgl_meninggal' => $this -> input -> post('tgl_meninggal'),
		  'penyebab' => $this -> input -> post('penyebab'),
		  'keterangan' => $this -> input -> post('keterangan'),
		  'updated_by' => $this -> input -> $id_user
		  );

		//insert ke database
		$this->db->where('id_kematian', $id);
		$this->db->update('t_kematian', $data);

		$this->session->set_flashdata('alert','update');
		return true;
	}

	public function hapus($id)
	{
		//ambil data admin yang menginputkan data
		/*$data_session = $this->session->userdata('session');
		$id_user = $data_session['id_user'];*/

		//insert ke database
		$this->db->set('status', 0);
		$this->db->where('id_kematian', $id);
		$this->db->update('t_kematian');

		$this->session->set_flashdata('alert','delete');
		return true;
	}
}