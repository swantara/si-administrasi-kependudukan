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
			tp.nama as nama_penduduk, tp.nik, tp.nama as nama_kepala_keluarga, tp.nama_ayah, tp.nama_ibu,
			mp.provinsi, 
			mk.kabupaten, 
			mkc.kecamatan, 
			md.desa, 
			mb.banjar 
			from t_pindah p 
			inner join t_penduduk tp on tp.id_penduduk=p.id_kepala_keluarga 
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

	public function getdetailpindah($id)
	{
		$query = $this->db->query('select tp.*, 
			p.id_penduduk, p.nama as nama_penduduk, p.nik as nik, p.no_kk, p.pekerjaan, p.periode_data as periode_data, p.foto as foto, p.tgl_lahir, p.tempat_lahir, p.jk, p.alamat_saat_ini, p.status_kk, p.id_agama, p.id_pendidikan, p.telepon, p.status_kawin, p.status_kependudukan, p.kewarganegaraan, p.nama_ayah, p.nama_ibu,
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
			from t_pindah tp 
			inner join t_penduduk p on p.id_penduduk=tp.id_kepala_keluarga 
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
			where tp.status <> 0 and id_pindah='.$id);

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
		$nkk = $this -> input -> post('nkk');

		$data = array(
		  'status_kependudukan' => '3',
		  'updated_by' => $id_user
		  );

		//insert ke database
		$this->db->where('no_kk', $nkk);
		$this->db->update('t_penduduk', $data);
		
		
		$data = array(
		  'no_kk' => $this -> input -> post('nkk'),
		  'id_kepala_keluarga' => $this -> input -> post('id_penduduk'),
		  'tgl_pindah' => date('Y-m-d', strtotime($this -> input -> post('tanggal_pindah'))),
		  'alasan_pindah' => $this -> input -> post('alasan_pindah'),
		  'alamat_tujuan' => $this -> input -> post('alamat_tujuan'),
		  'id_provinsi' => $this -> input -> post('provinsi'),
		  'id_kabupaten' => $this -> input -> post('kabupaten'),
		  'id_kecamatan' => $this -> input -> post('kecamatan'),
		  'id_desa' => $this -> input -> post('desa'),
		  'id_banjar' => $this -> input -> post('banjar'),
		  'keterangan' => $this -> input -> post('keterangan'),
		  'created_by' => $id_user
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
		  'no_kk' => $this -> input -> post('nkk'),
		  'tgl_pindah' => date('Y-m-d', strtotime($this -> input -> post('tanggal_pindah'))),
		  'alasan_pindah' => $this -> input -> post('alasan_pindah'),
		  'alamat_tujuan' => $this -> input -> post('alamat_tujuan'),
		  'id_provinsi' => $this -> input -> post('provinsi'),
		  'id_kabupaten' => $this -> input -> post('kabupaten'),
		  'id_kecamatan' => $this -> input -> post('kecamatan'),
		  'id_desa' => $this -> input -> post('desa'),
		  'id_banjar' => $this -> input -> post('banjar'),
		  'keterangan' => $this -> input -> post('keterangan'),
		  'updated_by' => $id_user
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

	private function uploadfoto($id)
	{
		//proses upload foto

		//mengambil data foto dan mengganti filenamenya sesuai id
		$arrayname = explode(".", $_FILES['foto']['name']);
		$ext = end($arrayname);
		$newfilename = 'img-'.$id.'.'.$ext;

		//fungsi upload foto
		$config['upload_path']          = './assets/img/fotopenduduk/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']        = $newfilename;
        $config['overwrite']        = true;
        $this->load->library('upload');
		$this->upload->initialize($config);

		if ($this->upload->do_upload('foto'))
        {
        	//bila berhasil update data path foto sebelumnya
        	$this->db->set('foto', $newfilename);
			$this->db->where('id_penduduk', $id);
			$this->db->update('t_penduduk');
        }
	}
}