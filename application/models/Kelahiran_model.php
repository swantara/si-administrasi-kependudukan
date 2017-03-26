<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelahiran_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function getkelahiran()
	{
		$query = $this->db->query('select k.*, p.nama as nama_penduduk, pa.nama as nama_ibu, pb.nama as nama_ayah, pc.nama as nama_saksi1, pd.nama as nama_saksi2 from t_kelahiran k inner join t_penduduk p on p.id_penduduk=k.id_penduduk inner join t_penduduk pa on pa.id_penduduk=k.id_ibu inner join t_penduduk pb on pb.id_penduduk=k.id_ayah inner join t_penduduk pc on pc.id_penduduk=k.id_saksi1 inner join t_penduduk pd on pd.id_penduduk=k.id_saksi2');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getdetailkelahiran($id)
	{
		$query = $this->db->query('select k.*, p.nama as nama_penduduk, pa.nama as nama_ibu, pb.nama as nama_ayah, pc.nama as nama_saksi1, pd.nama as nama_saksi2 from t_kelahiran k inner join t_penduduk p on p.id_penduduk=k.id_penduduk inner join t_penduduk pa on pa.id_penduduk=k.id_ibu inner join t_penduduk pb on pb.id_penduduk=k.id_ayah inner join t_penduduk pc on pc.id_penduduk=k.id_saksi1 inner join t_penduduk pd on pd.id_penduduk=k.id_saksi2 where id_penduduk='.$id);

		// $query = "select k.*, pa.nama as namaayah, pi.nama as namaibu from t_kelahiran k
		// 	inner join t_penduduk pa on k.ayah=pa.id_penduduk
		// 	inner join t_penduduk pi on k.ibu=pi.id_penduduk";

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
		$id_user = $data_session['id_user'];
		
		$data = array(
		  'id_penduduk' => $this -> input -> post('id_penduduk'),
		  'kewarganegaraan' => $this -> input -> post('kewarganegaraan'),
		  'id_ibu' => $this -> input -> post('id_ibu'),
		  'id_ayah' => $this -> input -> post('id_ayah'),
		  'id_saksi1' => $this -> input -> post('id_saksi1'),
		  'id_saksi2' => $this -> input -> post('id_saksi2'),
		  'created_by' => $this -> input -> $id_user
		  );

		//insert ke database
		$this->db->insert('t_kelahiran', $data);

		$this->session->set_flashdata('alert','save');
		return true;
	}

	public function ubah($id)
	{
		//ambil data admin yang menginputkan data
		$data_session = $this->session->userdata('session');
		$id_user = $data_session['id_user'];

		$data = array(
		  'id_penduduk' => $this -> input -> post('id_penduduk'),
		  'kewarganegaraan' => $this -> input -> post('kewarganegaraan'),
		  'id_ibu' => $this -> input -> post('id_ibu'),
		  'id_ayah' => $this -> input -> post('id_ayah'),
		  'id_saksi1' => $this -> input -> post('id_saksi1'),
		  'id_saksi2' => $this -> input -> post('id_saksi2'),
		  'updated_by' => $this -> input -> $id_user
		  );

		//insert ke database
		//$this->db->set('tgl', 'now()', false);
		$this->db->where('id_kelahiran', $id);
		$this->db->update('t_kelahiran', $data);

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
		$this->db->where('id_kelahiran', $id);
		$this->db->update('t_kelahiran');

		$this->session->set_flashdata('alert','delete');
		return true;
	}
}