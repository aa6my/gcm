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

	public function ajax_populate_dropdown(){

		$action = $this->input->post('action');
    	$getId = $this->input->post('id');

    	if($action == 'GetStaff'){

    		$table = "admins";
    		$where = array('isActive' => 1);

        /*$strorder = ($order) ? " ORDER BY CONCAT(adminFirstName,' ',adminLastName)" : "";        
        $query = "SELECT 
                adminId,
                CONCAT(adminFirstName,' ',adminLastName) AS theStaff
                FROM admins
                WHERE isActive = 1"
                .$strorder;

        $res_arr_values = array();
        
        while($row = mysqli_fetch_assoc($res))
        {
            array_push($res_arr_values, $row);
        }*/

        $data_admin = $this->segi_model->get_all_rows($table, $where);
        echo json_encode($data_admin);
    	
		}

	
	}
}

