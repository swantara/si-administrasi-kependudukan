<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelahiran_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function getkelahiran()
	{
		$query = $this->db->query('select k.*, 
			p.nama as nama_penduduk, p.nik as nik, p.tempat_lahir, p.tgl_lahir, p.no_kk,
			pa.nama as nama_ibu, 
			pb.nama as nama_ayah, 
			pc.nama as nama_saksi1, 
			pd.nama as nama_saksi2 
			from t_kelahiran k 
			inner join t_penduduk p on p.id_penduduk=k.id_penduduk 
			inner join t_penduduk pa on pa.id_penduduk=k.id_ibu 
			inner join t_penduduk pb on pb.id_penduduk=k.id_ayah 
			inner join t_penduduk pc on pc.id_penduduk=k.id_saksi1 
			inner join t_penduduk pd on pd.id_penduduk=k.id_saksi2
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

	public function getdetailkelahiran($id)
	{
		$query = $this->db->query('select k.*, 
			p.nama as nama_penduduk, p.nik as nik, p.no_kk, p.pekerjaan, p.periode_data as periode_data, p.foto as foto, p.tgl_lahir, p.tempat_lahir, p.jk, p.alamat_saat_ini, p.status_kk, p.id_agama, p.id_pendidikan, p.telepon, p.status_kawin, p.status_kependudukan, 
			pa.nama as nama_ibu, pa.nik as nik_ibu, 
			pb.nama as nama_ayah, pb.nik as nik_ayah, 
			pc.nama as nama_saksi1, pc.nik as nik_saksi1, 
			pd.nama as nama_saksi2, pd.nik as nik_saksi2, 
			s.shdk as status_keluarga, 
			a.agama, 
			pt.pend_akhir as pendidikan, 
			sk.status_kawin as status_perkawinan, 
			skp.status_kependudukan as status_penduduk 
			from t_kelahiran k 
			inner join t_penduduk p on p.id_penduduk=k.id_penduduk 
			inner join t_penduduk pa on pa.id_penduduk=k.id_ibu 
			inner join t_penduduk pb on pb.id_penduduk=k.id_ayah 
			inner join t_penduduk pc on pc.id_penduduk=k.id_saksi1 
			inner join t_penduduk pd on pd.id_penduduk=k.id_saksi2
			inner join m_shdk s on s.id_shdk=p.status_kk 
			inner join m_agama a on a.id_agama=p.id_agama 
			inner join m_pendidikan_terakhir as pt on pt.id_pendidikan=p.id_pendidikan 
			left join m_status_kawin as sk on sk.id_status_kawin=p.status_kawin 
			left join m_status_kependudukan as skp on skp.id_status_kependudukan=p.status_kependudukan
			where k.status <> 0 and id_kelahiran='.$id);

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

	public function getnamapenduduk()
	{
		$query = $this->db->query('select p.nik, p.nama from t_penduduk as p');

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
		
		$data = array(
		  'id_penduduk' => $lastid,
		  'kewarganegaraan' => $this -> input -> post('kewarganegaraan'),
		  'id_ibu' => $this -> input -> post('id_ibu'),
		  'id_ayah' => $this -> input -> post('id_ayah'),
		  'id_saksi1' => $this -> input -> post('id_saksi_I'),
		  'id_saksi2' => $this -> input -> post('id_saksi_II'),
		  'created_by' => $id_user
		  );

		//insert ke database
		$this->db->insert('t_kelahiran', $data);

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
		$this->db->where('id_kelahiran', $id);
		$this->db->update('t_kelahiran');

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

		$query = "select k.*,
				p.no_kk, p.nik, p.nama, p.periode_data, p.status_kk, p.tempat_lahir, p.tgl_lahir, p.jk, p.alamat_saat_ini, p.id_agama, p.id_pendidikan, p.pekerjaan, p.telepon, p.status_kawin, p.status_kependudukan, p.kewarganegaraan,
				s.shdk as status_keluarga,
				a.agama, 
				pt.pend_akhir as pendidikan, 
				sk.status_kawin as status_perkawinan, 
				skp.status_kependudukan as status_penduduk,
				pa.nama as nama_ibu, 
				pb.nama as nama_ayah, 
				pc.nama as nama_saksi1, 
				pd.nama as nama_saksi2 
			from t_kelahiran k
            inner join t_penduduk p on p.id_penduduk=k.id_penduduk
			inner join m_shdk s on s.id_shdk=p.status_kk 
			inner join m_agama a on a.id_agama=p.id_agama 
			inner join m_pendidikan_terakhir as pt on pt.id_pendidikan=p.id_pendidikan 
			left join m_status_kawin as sk on sk.id_status_kawin=p.status_kawin 
			left join m_status_kependudukan as skp on skp.id_status_kependudukan=p.status_kependudukan
			inner join t_penduduk pa on pa.id_penduduk=k.id_ibu 
			inner join t_penduduk pb on pb.id_penduduk=k.id_ayah 
			inner join t_penduduk pc on pc.id_penduduk=k.id_saksi1 
			inner join t_penduduk pd on pd.id_penduduk=k.id_saksi2
			where k.status <> 0 and ";

		if($no_kk != "")
		{
			$query = $query." p.no_kk like '%$no_kk%' and ";
		}

		if($nik != "")
		{
			$query = $query." p.nik like '%$nik%' and ";
		}

		if($nama_penduduk != "")
		{
			$query = $query." p.nama like '%$nama_penduduk%' and ";
		}

		if($periode != "")
		{
			$query = $query." p.periode_data like '%$periode%' and ";
		}

		if($status_kk != "")
		{
			$query = $query." p.status_kk = '$status_kk' and ";
		}

		if($tempat_lahir != "")
		{
			$query = $query." p.tempat_lahir like '%$tempat_lahir%' and ";
		}

		if($tanggal_lahir != "")
		{
			$query = $query." p.tgl_lahir = '".date('Y-m-d', strtotime($tanggal_lahir))."' and ";
		}

		if($jenis_kelamin != "2")
		{
			$query = $query." p.jk = '$jenis_kelamin' and ";
		}

		if($alamat != "")
		{
			$query = $query." p.alamat_saat_ini like '%$alamat%' and ";
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
			$query = $query." p.pekerjaan like '%$pekerjaan%' and ";
		}

		if($telepon != "")
		{
			$query = $query." p.telepon like '%$telepon%' and ";
		}

		if($nama_ayah != "")
		{
			$query = $query." p.nama_ayah like '%$nama_ayah%' and ";
		}

		if($nama_ibu != "")
		{
			$query = $query." p.nama_ibu like '%$nama_ibu%' and ";
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
			$query = $query." p.kewarganegaraan like '%$kewarganegaraan%' and ";
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
				$date=date_create( $result->tgl_lahir);
              	$newdate=date_format($date,"d-m-Y");
				$data[$no][0] = $newdate; 
				$data[$no][1] = $result->no_kk; 
				$data[$no][2] = $result->nik;
				$data[$no][3] = $result->nama; 
				$data[$no][4] = $result->tempat_lahir; 
				$data[$no][5] = $result->nama_ibu;
				$data[$no][6] = $result->nama_ayah;
				$data[$no][7] = '<div class="btn-group-vertical">
                      <button type="button" class="btn btn-default" onClick="window.location.href='."'".site_url('kelahiran/detail/'.$result->id_kelahiran)."'".'">
                        <div class="pull-left">
                          <i class="fa fa-eye"></i> Detail
                        </div>
                      </button>
                      <button type="button" class="btn btn-default" onClick="window.location.href='."'".site_url('kelahiran/edit/'.$result->id_kelahiran)."'".'">
                        <div class="pull-left">
                          <i class="fa fa-edit"></i> Ubah
                        </div>
                      </button>
                      <button type="button" class="btn btn-danger" onClick="window.location.href='."'".site_url('kelahiran/hapus/'.$result->id_kelahiran)."'".'">
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