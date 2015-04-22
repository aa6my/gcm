<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->output->enable_profiler(TRUE);
		//Do your magic here
	}

	public function index(){

		$this->load->view('admin/a_dashboard');
	}

	
}

