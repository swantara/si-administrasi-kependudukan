<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendatang_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function getpendatang()
	{
		$query = $this->db->query('select p.*, tp.nama as nama_penduduk, mp.provinsi, mk.kabupaten, mkc.kecamatan, md.desa, mb.banjar from t_pendatang p inner join t_penduduk tp on tp.id_penduduk=p.id_penduduk inner join m_provinsi mp on mp.id_provinsi=p.id_provinsi inner join m_kabupaten mk on mk.id_kabupaten=p.id_kabupaten inner join m_kecamatan mkc on mkc.id_kecamatan=p.id_kecamatan inner join m_desa md on md.id_desa=p.id_desa inner join m_banjar mb on mb.id_banjar=p.id_banjar');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getdetailpendatang($id)
	{
		$query = $this->db->query('select p.*, tp.nama as nama_penduduk, mp.provinsi, mk.kabupaten, mkc.kecamatan, md.desa, mb.banjar from t_pendatang p inner join t_penduduk tp on tp.id_penduduk=p.id_penduduk inner join m_provinsi mp on mp.id_provinsi=p.id_provinsi inner join m_kabupaten mk on mk.id_kabupaten=p.id_kabupaten inner join m_kecamatan mkc on mkc.id_kecamatan=p.id_kecamatan inner join m_desa md on md.id_desa=p.id_desa inner join m_banjar mb on mb.id_banjar=p.id_banjar where p.id_pendatang='.$id);

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
		  'alamat_asal' => $this -> input -> post('alamat_asal'),
		  'id_provinsi' => $this -> input -> post('id_provinsi'),
		  'id_kabupaten' => $this -> input -> post('id_kabupaten'),
		  'id_kecamatan' => $this -> input -> post('id_kecamatan'),
		  'id_desa' => $this -> input -> post('id_desa'),
		  'id_banjar' => $this -> input -> post('id_banjar'),
		  'keterangan' => $this -> input -> post('keterangan'),
		  'created_by' => $this -> input -> $id_user
		  );

		//insert ke database
		$this->db->insert('t_pendatang', $data);

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
		  'alamat_asal' => $this -> input -> post('alamat_asal'),
		  'id_provinsi' => $this -> input -> post('id_provinsi'),
		  'id_kabupaten' => $this -> input -> post('id_kabupaten'),
		  'id_kecamatan' => $this -> input -> post('id_kecamatan'),
		  'id_desa' => $this -> input -> post('id_desa'),
		  'id_banjar' => $this -> input -> post('id_banjar'),
		  'keterangan' => $this -> input -> post('keterangan'),
		  'updated_by' => $this -> input -> $id_user
		  );

		//insert ke database
		$this->db->where('id_pendatang', $id);
		$this->db->update('t_pendatang', $data);

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
		$this->db->where('id_pendatang', $id);
		$this->db->update('t_pendatang');

		$this->session->set_flashdata('alert','delete');
		return true;
	}
}