<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pindah_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function getpindah()
	{
		$query = $this->db->query('select p.*, 
			tp.nama as nama_penduduk, tp.nik, tp.nama as nama_kepala_keluarga, tp.status_kk,
			mp.provinsi, 
			mk.kabupaten, 
			mkc.kecamatan, 
			md.desa, 
			mb.banjar 
			from t_pindah p 
			inner join t_penduduk tp on tp.no_kk=p.no_kk 
			inner join m_provinsi mp on mp.id_provinsi=p.id_provinsi 
			inner join m_kabupaten mk on mk.id_kabupaten=p.id_kabupaten 
			inner join m_kecamatan mkc on mkc.id_kecamatan=p.id_kecamatan 
			inner join m_desa md on md.id_desa=p.id_desa 
			inner join m_banjar mb on mb.id_banjar=p.id_banjar
			where p.status <> 0
			and tp.status_kk = 1');

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

	public function getkepalakeluargabynkk($nkk)
	{
		$query = $this->db->query('select p.*, 
			s.shdk as status_keluarga, 
			a.agama, 
			pt.pend_akhir as pendidikan, 
			sk.status_kawin as status_perkawinan, 
			skp.status_kependudukan as status_penduduk 
			from t_penduduk p 
			inner join m_shdk s on s.id_shdk=p.status_kk 
			inner join m_agama a on a.id_agama=p.id_agama 
			inner join m_pendidikan_terakhir as pt on pt.id_pendidikan=p.id_pendidikan 
			left join m_status_kawin as sk on sk.id_status_kawin=p.status_kawin 
			left join m_status_kependudukan as skp on skp.id_status_kependudukan=p.status_kependudukan 
			where p.status_kk=1 and p.no_kk='.$nkk);

		if($query->num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
}