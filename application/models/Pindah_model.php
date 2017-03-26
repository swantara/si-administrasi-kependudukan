<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pindah_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function getpindah()
	{
		$query = $this->db->query('select p.*, mp.provinsi, mk.kabupaten, mkc.kecamatan, md.desa, mb.banjar from t_pindah p inner join m_provinsi mp on mp.id_provinsi=p.id_provinsi inner join m_kabupaten mk on mk.id_kabupaten=p.id_kabupaten inner join m_kecamatan mkc on mkc.id_kecamatan=p.id_kecamatan inner join m_desa md on md.id_desa=p.id_desa inner join m_banjar mb on mb.id_banjar=p.id_banjar');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getdetailpindah($id)
	{
		$query = $this->db->query('select p.*, mp.provinsi, mk.kabupaten, mkc.kecamatan, md.desa, mb.banjar from t_pindah p inner join m_provinsi mp on mp.id_provinsi=p.id_provinsi inner join m_kabupaten mk on mk.id_kabupaten=p.id_kabupaten inner join m_kecamatan mkc on mkc.id_kecamatan=p.id_kecamatan inner join m_desa md on md.id_desa=p.id_desa inner join m_banjar mb on mb.id_banjar=p.id_banjar where p.id_pindah='.$id);

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
		  'no_kk' => $this -> input -> post('no_kk'),
		  'tgl_pindah' => $this -> input -> post('tgl_pindah'),
		  'alasan_pindah' => $this -> input -> post('alasan_pindah'),
		  'alamat_tujuan' => $this -> input -> post('alamat_tujuan'),
		  'id_provinsi' => $this -> input -> post('id_provinsi'),
		  'id_kabupaten' => $this -> input -> post('id_kabupaten'),
		  'id_kecamatan' => $this -> input -> post('id_kecamatan'),
		  'id_desa' => $this -> input -> post('id_desa'),
		  'id_banjar' => $this -> input -> post('id_banjar'),
		  'keterangan' => $this -> input -> post('keterangan'),
		  'created_by' => $this -> input -> $id_user
		  );

		//insert ke database
		$this->db->insert('t_pindah', $data);

		$this->session->set_flashdata('alert','save');
		return true;
	}

	public function edit($id)
	{
		//ambil data admin yang menginputkan data
		$data_session = $this->session->userdata('session');
		$id_user = $data_session['id_user'];

		$data = array(
		  'no_kk' => $this -> input -> post('no_kk'),
		  'tgl_pindah' => $this -> input -> post('tgl_pindah'),
		  'alasan_pindah' => $this -> input -> post('alasan_pindah'),
		  'alamat_tujuan' => $this -> input -> post('alamat_tujuan'),
		  'id_provinsi' => $this -> input -> post('id_provinsi'),
		  'id_kabupaten' => $this -> input -> post('id_kabupaten'),
		  'id_kecamatan' => $this -> input -> post('id_kecamatan'),
		  'id_desa' => $this -> input -> post('id_desa'),
		  'id_banjar' => $this -> input -> post('id_banjar'),
		  'keterangan' => $this -> input -> post('keterangan'),
		  'updated_by' => $this -> input -> $id_user
		  );

		//insert ke database
		$this->db->where('id_pindah', $id);
		$this->db->update('t_pindah', $data);

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
		$this->db->where('id_pindah', $id);
		$this->db->update('t_pindah');

		$this->session->set_flashdata('alert','delete');
		return true;
	}
}