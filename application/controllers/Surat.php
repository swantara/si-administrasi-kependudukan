<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(BASEPATH.'../assets/templatedoc/template1.docx');

		$templateProcessor->setValue('nama_kaling', 'meong');
		$templateProcessor->setValue('tgl_surat_kelahiran', 'tgl meong');
		$templateProcessor->setValue('no_kelahiran', 'no meong');

		$templateProcessor->saveAs('assets/outputdoc/hasil.docx');

		// Your browser will name the file "hasil.docx"
		// regardless of what it's named on the server 
		header("Content-Disposition: attachment; filename=hasil.docx");
		readfile('assets/outputdoc/hasil.docx'); // or echo file_get_contents($temp_file);
		unlink('assets/outputdoc/hasil.docx');  // remove temp file
	}
}