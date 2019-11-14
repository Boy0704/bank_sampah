<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

	
	public function index()
	{
		$data = array(
			'konten' => 'f_home',
			'judul' => 'Dashboard',
		);
		$this->load->view('front/f_index',$data);
	}
}
