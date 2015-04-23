<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clients extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->output->enable_profiler(TRUE);
		//Do your magic here
	}

	public function list_client(){

		$this->load->view('admin/a_client_list');
	}

	public function add_client(){

		$table = "contracts";
		$data['contracts'] = $this->segi_model->get_all_rows($table);
		$this->load->view('admin/a_client_add', $data);
	}

	
}

