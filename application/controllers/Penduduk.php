<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penduduk extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('penduduk_model', 'penduduk', true);

		// if(!$this->session->userdata('session'))
  //  		{
  //  			redirect('login', 'refresh');
  //  		}

		//$this->output->enable_profiler(TRUE);
	}

	public function index()
	{
		//$data['data'] = $this->penduduk->getpenduduk();
		$data['body'] = $this->load->view('view_penduduk', '', true);
		$this->load->view('template', $data);
	}

	public function pencarian()
	{
		// $data['data'] = $this->kelahiran->getkelahiran();
		$data['shdk'] = $this->penduduk->getshdk();
		$data['agama'] = $this->penduduk->getagama();
		$data['pendidikan'] = $this->penduduk->getpendidikan();
		$data['kawin'] = $this->penduduk->getstatuskawin();
		$data['kependudukan'] = $this->penduduk->getstatuspenduduk();
		$data['body'] = $this->load->view('view_penduduk_filter', $data, true);
		$this->load->view('template', $data);
	}

	public function pencarianservice()
	{
		$this->penduduk->getfilter();
		// redirect('penduduk/pencarian','refresh');
	}

	public function tambah()
	{
		$this->form_validation->set_rules('periode_data', 'Periode Data', 'trim|required');
		$this->form_validation->set_rules('nik', 'NIK', 'trim|required');
		$this->form_validation->set_rules('nkk', 'NKK', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('telepon', 'Telepon', 'trim|required');
		$this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'trim|required');
		$this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'trim|required');
		$this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'trim|required');

		if($this->form_validation->run() === false)
		{
			$data['shdk'] = $this->penduduk->getshdk();
			$data['agama'] = $this->penduduk->getagama();
			$data['pendidikan'] = $this->penduduk->getpendidikan();
			$data['kawin'] = $this->penduduk->getstatuskawin();
			$data['kependudukan'] = $this->penduduk->getstatuspenduduk();
			$data['body'] = $this->load->view('tambah_penduduk', $data, true);
			$this->load->view('template', $data);
		}
		else
		{
			$this->penduduk->simpan();
			redirect('penduduk','refresh');
		}
	}

	public function detail($id)
	{
		$data['data'] = $this->penduduk->getdetailpenduduk($id);
		$data['body'] = $this->load->view('detail_penduduk', $data, true);
		$this->load->view('template', $data);
	}

	public function edit($id) 
	{
		$this->form_validation->set_rules('periode_data', 'Periode Data', 'trim|required');
		$this->form_validation->set_rules('nik', 'NIK', 'trim|required');
		$this->form_validation->set_rules('nkk', 'NKK', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('telepon', 'Telepon', 'trim|required');
		$this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'trim|required');
		$this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'trim|required');
		$this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'trim|required');
		
		if($this->form_validation->run() === false)
		{
			$data['data'] = $this->penduduk->getdetailpenduduk($id)[0];
			$data['shdk'] = $this->penduduk->getshdk();
			$data['agama'] = $this->penduduk->getagama();
			$data['pendidikan'] = $this->penduduk->getpendidikan();
			$data['kawin'] = $this->penduduk->getstatuskawin();
			$data['kependudukan'] = $this->penduduk->getstatuspenduduk();
			$data['body'] = $this->load->view('edit_penduduk', $data, true); 
			$this->load->view('template', $data);
		}
		else
		{
			$this->penduduk->edit($id);
			redirect('penduduk/detail/'.$id,'refresh');
		}
	}

	public function hapus($id)
	{
		$this->penduduk->hapus($id);
		redirect('penduduk','refresh');
	}

	public function ajaxgetdetailbynik($nik)
	{
		if($this->input->is_ajax_request()){
			echo json_encode($this->penduduk->getdetailpendudukbynik($nik)[0]);
		}
	}

	public function ajaxviewpenduduk()
	{
		if($this->input->is_ajax_request())
		{
			// DB table to use
			$table = 't_penduduk';
			// Table's primary key
			$primaryKey = 'p`.`id_penduduk';
			// Array of database columns which should be read and sent back to DataTables.
			// The `db` parameter represents the column name in the database, while the `dt`
			// parameter represents the DataTables column identifier. In this case simple
			// indexes
			$columns = array(
				// array( 'db' => '`r`.`hdno`', 'dt' => 0, 'field' => 'hdno' , 
				// 		'formatter' => function( $d, $row ) {
				// 	return '<a href="'.site_url("info/detail").'/'.$row['id'].'" > '.$d.'</a>';
				// 	}),				
				array( 'db' => "DATE_FORMAT(p.tgl_lahir,'%d-%c-%Y')",     'dt' => 0, 'field' => "DATE_FORMAT(p.tgl_lahir,'%d-%c-%Y')"),
				array( 'db' => '`p`.`tempat_lahir`',   'dt' => 1, 'field' => 'tempat_lahir' ),
				array( 'db' => '`p`.`no_kk`',   'dt' => 2, 'field' => 'no_kk' ),
				array( 'db' => '`p`.`nik`',   'dt' => 3, 'field' => 'nik' ),

				// array( 'db' => '`p`.`created_at`', 'dt' => 2, 'field' => 'created_at' , 
				// 		'formatter' => function( $d, $row ) {
				// 			$date=date_create($d);
		  //                   $newdate=date_format($date,"d-m-Y");
    //                 	return $newdate;
				// 	}),
				array( 'db' => '`p`.`nama`',   'dt' => 4, 'field' => 'nama' ),
				// array( 'db' => "CONCAT(p.tempat_lahir, ', ', CAST(DATE_FORMAT(p.tgl_lahir,'%d-%c-%Y') as char))",     'dt' => 4, 'field' => "CONCAT(p.tempat_lahir, ', ', CAST(DATE_FORMAT(p.tgl_lahir,'%d-%c-%Y') as char))"),
				// array( 'db' => '`p`.`tgl_lahir`', 'dt' => 4, 'field' => 'tgl_lahir' , 
				// 		'formatter' => function( $d, $row ) {
				// 			$date=date_create($d);
		  //                   $newdate=date_format($date,"d-m-Y");
    //                 	return $row['status_kawin'] . ", " . $newdate;
				// 	}),
				array( 'db' => "cast(CASE WHEN p.jk = 1 THEN 'Laki-laki' ELSE 'Perempuan' END as char)",     'dt' => 5, 'field' => "cast(CASE WHEN p.jk = 1 THEN 'Laki-laki' ELSE 'Perempuan' END as char)"),
				array( 'db' => '`p`.`alamat_saat_ini`',   'dt' => 6, 'field' => 'alamat_saat_ini' ),
				array( 'db' => '`sk`.`status_kawin`',   'dt' => 7, 'field' => 'status_kawin' ),
				array('db'  => '`p`.`id_penduduk`',     'dt' => 8, 'field' => 'id_penduduk', 
						'formatter' => function( $d, $row ) {
					return '

                    <div class="btn-group-vertical">
                      <button type="button" class="btn btn-default" onClick="window.location.href='."'".site_url('penduduk/detail/'.$d)."'".'">
                        <div class="pull-left">
                          <i class="fa fa-eye"></i> Detail
                        </div>
                      </button>
                      <button type="button" class="btn btn-default" onClick="window.location.href='."'".site_url('penduduk/edit/'.$d)."'".'">
                        <div class="pull-left">
                          <i class="fa fa-edit"></i> Ubah
                        </div>
                      </button>
                      <button type="button" class="btn btn-danger" onClick="window.location.href='."'".site_url('penduduk/hapus/'.$d)."'".'">
                        <div class="pull-left">
                          <i class="fa fa-trash"></i> Hapus
                        </div>
                      </button>
                    </div>';

					// return '<ul class="icons-list text-center">
					// 			<li class="dropdown">
					// 				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					// 					<i class="icon-menu9"></i>
					// 				</a>
					// 				<ul class="dropdown-menu dropdown-menu-right">
					// 					<li><a href="'.site_url("rumah/edit/$d").'" ><i class="icon-pencil7"></i> Ubah</a></li>
					// 					<li><a href="#"><i class="icon-trash"></i> Hapus</a></li>
					// 				</ul>
					// 			</li>
					// 		</ul>';
					})
			);
			$sql_details = array(
				'user' => $this->db->username,
				'pass' => $this->db->password,
				'db'   => $this->db->database,
				'host' => $this->db->hostname
			);
			/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
			 * If you just want to use the basic configuration for DataTables with PHP
			 * server-side, there is no need to edit below this line.
			 */
			$this->load->library('ssp');
			$joinQuery = "FROM 
			`t_penduduk` AS `p` 
			INNER JOIN `m_shdk` AS `s` ON `s`.`id_shdk` = `p`.`status_kk` 
			INNER JOIN `m_agama` AS `a` ON `a`.`id_agama` = `p`.`id_agama` 
			INNER JOIN `m_pendidikan_terakhir` AS `pt` ON `pt`.`id_pendidikan` = `p`.`id_pendidikan` 
			LEFT JOIN `m_status_kawin` AS `sk` ON `sk`.`id_status_kawin` = `p`.`status_kawin` 
			LEFT JOIN `m_status_kependudukan` AS `skp` ON `skp`.`id_status_kependudukan` = `p`.`status_kependudukan`";
			$extraWhere = "`p`.`status` <> 0";        
			
			echo json_encode(
				$this->ssp->simple($_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere )
			);
		}
	}
}