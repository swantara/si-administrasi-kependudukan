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
			p.nama as nama_penduduk, p.nik as nik, p.no_kk, p.nama_ayah, p.nama_ibu
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
		$query = $this->db->query('select k.*, 
			p.nama as nama_penduduk, p.nik as nik, p.no_kk, p.pekerjaan, p.periode_data as periode_data, p.foto as foto, p.tgl_lahir, p.tempat_lahir, p.jk, p.alamat_saat_ini, p.status_kk, p.id_agama, p.id_pendidikan, p.telepon, p.status_kawin, p.status_kependudukan, p.kewarganegaraan, p.nama_ayah, p.nama_ibu,
			s.shdk as status_keluarga, 
			a.agama, 
			pt.pend_akhir as pendidikan, 
			sk.status_kawin as status_perkawinan, 
			skp.status_kependudukan as status_penduduk 
			from t_kematian k 
			inner join t_penduduk p on p.id_penduduk=k.id_penduduk
			inner join m_shdk s on s.id_shdk=p.status_kk 
			inner join m_agama a on a.id_agama=p.id_agama 
			inner join m_pendidikan_terakhir as pt on pt.id_pendidikan=p.id_pendidikan 
			left join m_status_kawin as sk on sk.id_status_kawin=p.status_kawin 
			left join m_status_kependudukan as skp on skp.id_status_kependudukan=p.status_kependudukan
			where k.status <> 0 and id_kematian='.$id);

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
		$id_user = 1; //$data_session['id_user'];
		$id_penduduk = $this -> input -> post('id_penduduk');

		if($_FILES['foto']['error'] != 4)
		{
			//bila mengubah foto
			
			//upload foto
			$this->uploadfoto($id);
		}

		$data = array(
		  'nik' => $this -> input -> post('nik'),
		  'no_kk' => $this -> input -> post('nkk'),
		  'periode_data' => $this -> input -> post('periode_data'),
		  'status_kk' => $this -> input -> post('status_kk'),
		  'nama' => $this -> input -> post('nama'),
		  'tempat_lahir' => $this -> input -> post('tempat_lahir'),
		  'tgl_lahir' => date('Y-m-d', strtotime($this -> input -> post('tanggal_lahir'))),
		  'jk' => $this -> input -> post('jenis_kelamin'),
		  'alamat_saat_ini' => $this -> input -> post('alamat'),
		  'id_agama' => $this -> input -> post('agama'),
		  'id_pendidikan' => $this -> input -> post('pendidikan'),
		  'pekerjaan' => $this -> input -> post('pekerjaan'),
		  'telepon' => $this -> input -> post('telepon'),
		  'status_kawin' => $this -> input -> post('status_kawin'),
		  'nama_ayah' => $this -> input -> post('nama_ayah'),
		  'nama_ibu' => $this -> input -> post('nama_ibu'),
		  'kewarganegaraan' => $this -> input -> post('kewarganegaraan'),
		  'status_kependudukan' => $this -> input -> post('status_kependudukan'),
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