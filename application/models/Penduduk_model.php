<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penduduk_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function getpenduduk()
	{
		$query = $this->db->query('select p.*, s.shdk as status_keluarga, a.agama, pt.pend_akhir as pendidikan, sk.status_kawin as status_perkawinan, skp.status_kependudukan as status_penduduk 
			from t_penduduk p 
			inner join m_shdk s on s.id_shdk=p.status_kk 
			inner join m_agama a on a.id_agama=p.id_agama 
			inner join m_pendidikan_terakhir as pt on pt.id_pendidikan=p.id_pendidikan 
			left join m_status_kawin as sk on sk.id_status_kawin=p.status_kawin 
			left join m_status_kependudukan as skp on skp.id_status_kependudukan=p.status_kependudukan 
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

	public function getdetailpenduduk($id)
	{
		$query = $this->db->query('select p.*, s.shdk as status_keluarga, a.agama, pt.pend_akhir as pendidikan, sk.status_kawin as status_perkawinan, skp.status_kependudukan as status_penduduk 
			from t_penduduk p 
			inner join m_shdk s on s.id_shdk=p.status_kk 
			inner join m_agama a on a.id_agama=p.id_agama 
			inner join m_pendidikan_terakhir as pt on pt.id_pendidikan=p.id_pendidikan 
			left join m_status_kawin as sk on sk.id_status_kawin=p.status_kawin 
			left join m_status_kependudukan as skp on skp.id_status_kependudukan=p.status_kependudukan 
			where p.status <> 0 and p.id_penduduk='.$id);

		if($query->num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getdetailpendudukbynik($nik)
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
			where p.status <> 0 
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

	public function getshdk()
	{
		$query = $this->db->query('select * from m_shdk');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getshdkexclude($id_shdk)
	{
		$query = $this->db->query('select * from m_shdk where id_shdk NOT IN ('.$id_shdk.')');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getagama()
	{
		$query = $this->db->query('select * from m_agama');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getagamaexclude($id_agama)
	{
		$query = $this->db->query('select * from m_agama where id_agama NOT IN ('.$id_agama.')');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getpendidikan()
	{
		$query = $this->db->query('select * from m_pendidikan_terakhir');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getpendidikanexclude($id_pendidikan)
	{
		$query = $this->db->query('select * from m_pendidikan_terakhir where id_pendidikan NOT IN ('.$id_pendidikan.')');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getstatuskawin()
	{
		$query = $this->db->query('select * from m_status_kawin');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getstatuskawinexclude($id_status_kawin)
	{
		$query = $this->db->query('select * from m_status_kawin where id_status_kawin NOT IN ('.$id_status_kawin.')');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getstatuspenduduk()
	{
		$query = $this->db->query('select * from m_status_kependudukan');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getstatuspendudukexclude($id_status_kependudukan)
	{
		$query = $this->db->query('select * from m_status_kependudukan where id_status_kependudukan NOT IN ('.$id_status_kependudukan.')');

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
		  'created_by' => $id_user
		  );

		//insert ke database
		$this->db->insert('t_penduduk', $data);
		$lastid = $this->db->insert_id();

		if($_FILES['foto']['error'] != 4)
		{
			//bila mengubah foto
			
			//upload foto
			$this->uploadfoto($lastid);
		}

		$this->session->set_flashdata('alert','save');
		return true;
	}

	public function edit($id)
	{
		//ambil data admin yang menginputkan data
		$data_session = $this->session->userdata('session');
		$id_user = 1; //$data_session['id_user'];
		
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
		$this->db->update('t_penduduk');

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

	public function getfilter()
	{		
		$no_kk = $this->input->post('no_kk');
		$nik = $this->input->post('nik');
		$nama_penduduk = $this->input->post('nama_penduduk');
		$periode = $this->input->post('periode');
		$status_kk = $this->input->post('status_kk');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('datepicker');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$alamat = $this->input->post('alamat');
		$agama = $this->input->post('agama');
		$pendidikan = $this->input->post('pendidikan');
		$pekerjaan = $this->input->post('pekerjaan');
		$telepon = $this->input->post('telepon');
		$nama_ayah = $this->input->post('nama_ayah');
		$nama_ibu = $this->input->post('nama_ibu');
		$status_kependudukan = $this->input->post('status_kependudukan');
		$status_kawin = $this->input->post('status_kawin');
		$kewarganegaraan = $this->input->post('kewarganegaraan');
		
		$query = "select p.*, 
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
			where p.status <> 0 and ";

		if($no_kk != "")
		{
			$query = $query." no_kk like '%$no_kk%' and ";
		}

		if($nik != "")
		{
			$query = $query." nik like '%$nik%' and ";
		}

		if($nama_penduduk != "")
		{
			$query = $query." nama like '%$nama_penduduk%' and ";
		}

		if($periode != "")
		{
			$query = $query." periode_data like '%$periode%' and ";
		}

		if($status_kk != "")
		{
			$query = $query." p.status_kk = '$status_kk' and ";
		}

		if($tempat_lahir != "")
		{
			$query = $query." tempat_lahir like '%$tempat_lahir%' and ";
		}

		if($tanggal_lahir != "")
		{
			$query = $query." tgl_lahir = '".date('Y-m-d', strtotime($tanggal_lahir))."' and ";
		}

		if($jenis_kelamin != "2")
		{
			$query = $query." jk = '$jenis_kelamin' and ";
		}

		if($alamat != "")
		{
			$query = $query." alamat_saat_ini like '%$alamat%' and ";
		}

		if($agama != "")
		{
			$query = $query." p.id_agama = '$agama' and ";
		}

		if($pendidikan != "")
		{
			$query = $query." p.id_pendidikan = '$pendidikan' and ";
		}

		if($pekerjaan != "")
		{
			$query = $query." pekerjaan like '%$pekerjaan%' and ";
		}

		if($telepon != "")
		{
			$query = $query." telepon like '%$telepon%' and ";
		}

		if($nama_ayah != "")
		{
			$query = $query." nama_ayah like '%$nama_ayah%' and ";
		}

		if($nama_ibu != "")
		{
			$query = $query." nama_ibu like '%$nama_ibu%' and ";
		}

		if($status_kependudukan != "")
		{
			$query = $query." p.status_kependudukan = '$status_kependudukan' and ";
		}

		if($status_kawin != "")
		{
			$query = $query." p.status_kawin = '$status_kawin' and ";
		}

		if($kewarganegaraan != "")
		{
			$query = $query." kewarganegaraan like '%$kewarganegaraan%' and ";
		}

		$query = substr($query, 0, strlen($query) - 5);

		// echo $query . " ";
		$querystr = $query;
		$query = $this->db->query($query);

		$data = array();

		if($query -> num_rows() > 0)
		{
			$data[0] = array();
			$no = 0;
			foreach ($query->result() as $result) {
				$data[$no][0] = $result->tgl_lahir; 
				$data[$no][1] = $result->tempat_lahir; 
				$data[$no][2] = $result->no_kk;
				$data[$no][3] = $result->nik; 
				$data[$no][4] = $result->nama; 
				if($result->jk == 1){
					$data[$no][5] = "Laki-laki";
				}
				else{
					$data[$no][5] = "Perempuan";
				}
				$data[$no][6] = $result->alamat_saat_ini; 
				$data[$no][7] = $result->status_perkawinan; 
				$data[$no][8] = '<div class="btn-group-vertical">
                      <button type="button" class="btn btn-default" onClick="window.location.href='."'".site_url('penduduk/detail/'.$result->id_penduduk)."'".'">
                        <div class="pull-left">
                          <i class="fa fa-eye"></i> Detail
                        </div>
                      </button>
                      <button type="button" class="btn btn-default" onClick="window.location.href='."'".site_url('penduduk/edit/'.$result->id_penduduk)."'".'">
                        <div class="pull-left">
                          <i class="fa fa-edit"></i> Ubah
                        </div>
                      </button>
                      <button type="button" class="btn btn-danger" onClick="window.location.href='."'".site_url('penduduk/hapus/'.$result->id_penduduk)."'".'">
                        <div class="pull-left">
                          <i class="fa fa-trash"></i> Hapus
                        </div>
                      </button>
                    </div>';
				$no++;
			}

			echo json_encode($data);
		}
		else
		{
			//echo $querystr;
			echo "meong";
		}
	}
}