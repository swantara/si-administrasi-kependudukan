<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_kelahiran_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function getsuratkelahiran()
	{
		$query = $this->db->query('select sk.*,
			k.id_penduduk,
            p.no_kk, p.nik, p.nama as nama_anak, p.tempat_lahir as tempat_lahir_anak, p.tgl_lahir as tgl_lahir_anak, p.jk as jk_anak, p.alamat_saat_ini as alamat_anak,
            pa.nik as nik_ayah, pa.nama as nama_ayah, pa.tempat_lahir as tempat_lahir_ayah, pa.tgl_lahir as tgl_lahir_ayah, pa.jk as jk_ayah, pa.pekerjaan as pekerjaan_ayah, pa.alamat_saat_ini as alamat_ayah,
            pb.nik as nik_ibu, pb.nama as nama_ibu, pb.tempat_lahir as tempat_lahir_ibu, pb.tgl_lahir as tgl_lahir_ibu, pb.jk as jk_ibu, pb.pekerjaan as pekerjaan_ibu, pb.alamat_saat_ini as alamat_ibu
			from t_surat_kelahiran sk
            inner join t_kelahiran k on k.id_kelahiran = sk.id_kelahiran
            inner join t_penduduk p on p.id_penduduk = k.id_penduduk
            inner join t_penduduk pa on pa.id_penduduk = k.id_ayah            
            inner join t_penduduk pb on pb.id_penduduk = k.id_ibu
			where sk.status <> 0');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getdetailsuratkelahiran($id)
	{
		$query = $this->db->query('select sk.*,
			k.id_penduduk,
            p.no_kk, p.nik, p.nama as nama_anak, p.tempat_lahir as tempat_lahir_anak, p.tgl_lahir as tgl_lahir_anak, p.jk as jk_anak, p.alamat_saat_ini as alamat_anak, p.foto as foto_anak,
            pa.nik as nik_ayah, pa.nama as nama_ayah, pa.tempat_lahir as tempat_lahir_ayah, pa.tgl_lahir as tgl_lahir_ayah, pa.jk as jk_ayah, pa.pekerjaan as pekerjaan_ayah, pa.alamat_saat_ini as alamat_ayah,
            pb.nik as nik_ibu, pb.nama as nama_ibu, pb.tempat_lahir as tempat_lahir_ibu, pb.tgl_lahir as tgl_lahir_ibu, pb.jk as jk_ibu, pb.pekerjaan as pekerjaan_ibu, pb.alamat_saat_ini as alamat_ibu
			from t_surat_kelahiran sk
            inner join t_kelahiran k on k.id_kelahiran = sk.id_kelahiran
            inner join t_penduduk p on p.id_penduduk = k.id_penduduk
            inner join t_penduduk pa on pa.id_penduduk = k.id_ayah            
            inner join t_penduduk pb on pb.id_penduduk = k.id_ibu
			where sk.status <> 0
			and sk.id_surat_lahir='.$id);

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

	public function getdetailkelahiranbynik($nik)
	{
		$query = $this->db->query('select k.*,
			p.id_penduduk, p.nik, p.no_kk, p.nama
			from t_kelahiran k
			inner join t_penduduk p on p.id_penduduk = k.id_penduduk
			where k.status <> 0
			and p.nik='.$nik);

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

		$data = array(
		  'id_kelahiran' => $this -> input -> post('id_kelahiran'),
		  'tgl_surat' => date('Y-m-d', strtotime($this -> input -> post('tanggal_surat'))),
		  'nama_kaling' => $this -> input -> post('nama_kaling'),
		  'no_surat_kaling' => $this -> input -> post('no_surat_kaling'),
		  'no_surat_kantor' => $this -> input -> post('no_surat_kantor'),
		  'keterangan' => $this -> input -> post('keterangan'),
		  'created_by' => $id_user
		  );

		//insert ke database
		$this->db->insert('t_surat_kelahiran', $data);
		$lastid = $this->db->insert_id();

		$this->session->set_flashdata('alert','save');
		return $lastid;
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
		  'kewarganegaraan' => $this -> input -> post('kewarganegaraan'),
		  'id_ibu' => $this -> input -> post('id_ibu'),
		  'id_ayah' => $this -> input -> post('id_ayah'),
		  'id_saksi1' => $this -> input -> post('id_saksi_I'),
		  'id_saksi2' => $this -> input -> post('id_saksi_II'),
		  'updated_by' => $id_user
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
		$this->db->where('id_surat_lahir', $id);
		$this->db->update('t_surat_kelahiran');

		$this->session->set_flashdata('alert','delete');
		return true;
	}
}