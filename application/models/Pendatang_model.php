<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendatang_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function getpendatang()
	{
		$query = $this->db->query('select p.*, 
			tp.nama as nama_penduduk, tp.nik, 
			mp.provinsi, 
			mk.kabupaten, 
			mkc.kecamatan, 
			md.desa, 
			mb.banjar 
			from t_pendatang p 
			inner join t_penduduk tp on tp.id_penduduk=p.id_penduduk 
			inner join m_provinsi mp on mp.id_provinsi=p.id_provinsi 
			inner join m_kabupaten mk on mk.id_kabupaten=p.id_kabupaten 
			inner join m_kecamatan mkc on mkc.id_kecamatan=p.id_kecamatan 
			inner join m_desa md on md.id_desa=p.id_desa 
			inner join m_banjar mb on mb.id_banjar=p.id_banjar
			where p.status <> 0');

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
		$query = $this->db->query('select tp.*, 
			p.nama as nama_penduduk, p.nik as nik, p.no_kk, p.pekerjaan, p.periode_data as periode_data, p.foto as foto, p.tgl_lahir, p.tempat_lahir, p.jk, p.alamat_saat_ini, p.status_kk, p.id_agama, p.id_pendidikan, p.telepon, p.status_kawin, p.status_kependudukan,
			s.shdk as status_keluarga, 
			a.agama, 
			pt.pend_akhir as pendidikan, 
			sk.status_kawin as status_perkawinan, 
			skp.status_kependudukan as status_penduduk,
			mp.provinsi, 
			mk.kabupaten, 
			mkc.kecamatan, 
			md.desa, 
			mb.banjar
			from t_pendatang tp 
			inner join t_penduduk p on p.id_penduduk=tp.id_penduduk
			inner join m_provinsi mp on mp.id_provinsi=tp.id_provinsi 
			inner join m_kabupaten mk on mk.id_kabupaten=tp.id_kabupaten 
			inner join m_kecamatan mkc on mkc.id_kecamatan=tp.id_kecamatan 
			inner join m_desa md on md.id_desa=tp.id_desa 
			inner join m_banjar mb on mb.id_banjar=tp.id_banjar
			inner join m_shdk s on s.id_shdk=p.status_kk 
			inner join m_agama a on a.id_agama=p.id_agama 
			inner join m_pendidikan_terakhir as pt on pt.id_pendidikan=p.id_pendidikan 
			left join m_status_kawin as sk on sk.id_status_kawin=p.status_kawin 
			left join m_status_kependudukan as skp on skp.id_status_kependudukan=p.status_kependudukan
			where tp.status <> 0 and id_pendatang='.$id);

		if($query->num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getprovinsi()
	{
		$query = $this->db->query('select * from m_provinsi');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getkabupaten()
	{
		$query = $this->db->query('select * from m_kabupaten');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getkecamatan()
	{
		$query = $this->db->query('select * from m_kecamatan');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getdesa()
	{
		$query = $this->db->query('select * from m_desa');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getbanjar()
	{
		$query = $this->db->query('select * from m_banjar');

		if($query->num_rows() > 0)
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
		  'status_kependudukan' => '2',
		  'updated_by' => $id_user
		  );

		//insert ke database
		$this->db->where('id_penduduk', $id_penduduk);
		$this->db->update('t_penduduk', $data);
		
		$data = array(
		  'id_penduduk' => $this -> input -> post('id_penduduk'),
		  'alamat_asal' => $this -> input -> post('alamat_asal'),
		  'id_provinsi' => $this -> input -> post('provinsi'),
		  'id_kabupaten' => $this -> input -> post('kabupaten'),
		  'id_kecamatan' => $this -> input -> post('kecamatan'),
		  'id_desa' => $this -> input -> post('desa'),
		  'id_banjar' => $this -> input -> post('banjar'),
		  'keterangan' => $this -> input -> post('keterangan'),
		  'created_by' => $id_user
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