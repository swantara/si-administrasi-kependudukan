<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penduduk_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function getpenduduk()
	{
		$query = $this->db->query('select p.*, s.shdk as status_keluarga, a.agama, pt.pend_akhir as pendidikan from t_penduduk p inner join m_shdk s on s.id_shdk=p.status_kk inner join m_agama a on a.id_agama=p.id_agama inner join m_pendidikan_terakhir as pt on pt.id_pendidikan=p.id_pendidikan');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getdetailpenduduk($id)
	{
		$query = $this->db->query('select p.*, s.shdk as status_keluarga, a.agama, pt.pend_akhir as pendidikan from t_penduduk p inner join m_shdk s on s.id_shdk=p.status_kk inner join m_agama a on a.id_agama=p.id_agama inner join m_pendidikan_terakhir as pt on pt.id_pendidikan=p.id_pendidikan where p.id_penduduk='.$id);

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
		  'periode_data' => $this -> input -> post('periode_data'),
		  'nik' => $this -> input -> post('nik'),
		  'nkk' => $this -> input -> post('nkk'),
		  'status_kk' => $this -> input -> post('status_kk'),
		  'nama' => $this -> input -> post('nama'),
		  'tempat_lahir' => $this -> input -> post('tempat_lahir'),
		  'tanggal_lahir' => $this -> input -> post('tanggal_lahir'),
		  'jenis_kelamin' => $this -> input -> post('jenis_kelamin'),
		  'alamat' => $this -> input -> post('alamat'),
		  'agama' => $this -> input -> post('agama'),
		  'pendidikan' => $this -> input -> post('pendidikan'),
		  'pekerjaan' => $this -> input -> post('pekerjaan'),
		  'telepon' => $this -> input -> post('telepon'),
		  'nama_ayah' => $this -> input -> post('nama_ayah'),
		  'nama_ibu' => $this -> input -> post('nama_ibu'),
		  'kewarganegaraan' => $this -> input -> post('kewarganegaraan'),
		  'status_kependudukan' => $this -> input -> post('status_kependudukan'),
		  'created_by' => $this -> input -> $id_user
		  );

		//insert ke database
		$this->db->insert('t_penduduk', $data);
		$lastid = $this->db->insert_id();

		$this->uploadfoto($lastid);

		$this->session->set_flashdata('alert','save');
		return true;
	}

	public function edit($id)
	{
		//ambil data admin yang menginputkan data
		/*$data_session = $this->session->userdata('session');
		$id_user = $data_session['id_user'];*/
		
		if($_FILES['foto']['error'] != 4)
		{
			//bila mengubah foto
			
			//upload foto
			$this->uploadfoto($id);
		}

		$data = array(
		  'nik' => $this -> input -> post('nik'),
		  'nkk' => $this -> input -> post('nkk'),
		  'status_kk' => $this -> input -> post('status_kk'),
		  'nama' => $this -> input -> post('nama'),
		  'tempat_lahir' => $this -> input -> post('tempat_lahir'),
		  'tanggal_lahir' => $this -> input -> post('tanggal_lahir'),
		  'jenis_kelamin' => $this -> input -> post('jenis_kelamin'),
		  'alamat' => $this -> input -> post('alamat'),
		  'agama' => $this -> input -> post('agama'),
		  'pendidikan' => $this -> input -> post('pendidikan'),
		  'pekerjaan' => $this -> input -> post('pekerjaan'),
		  'telepon' => $this -> input -> post('telepon'),
		  'nama_ayah' => $this -> input -> post('nama_ayah'),
		  'nama_ibu' => $this -> input -> post('nama_ibu'),
		  'kewarganegaraan' => $this -> input -> post('kewarganegaraan'),
		  'status_kependudukan' => $this -> input -> post('status_kependudukan'),
		  'updated_by' => $this -> input -> $id_user
		  );

		//insert ke database
		$this->db->where('id_penduduk', $id);
		$this->db->update('t_penduduk', $data);

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
		$this->db->where('id_penduduk', $id);
		$this->db->update('tb_penduduk');

		$this->session->set_flashdata('alert','delete');
		return true;
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