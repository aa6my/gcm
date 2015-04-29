<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clients extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->output->enable_profiler(TRUE);
		//Do your magic here
	}

	public function list_active_client(){

		$table = "clients";
		$where = array(
			'isActive' => 1
		);		
		$data['clients'] = $this->segi_model->get_all_rows($table, $where);
		$this->load->view('admin/a_client_list', $data);
	}

	public function list_inactive_client(){

		$table = "clients";
		$where = array(
			'isActive' => 0
		);		
		$data['clients'] = $this->segi_model->get_all_rows($table, $where);
		$this->load->view('admin/a_client_list_inactive', $data);
	}

	public function add_client(){

		$table = "contracts";
		$data['contracts'] = $this->segi_model->get_all_rows($table);
		$this->load->view('admin/a_client_add', $data);

		if($this->input->post('submit')){

			$newcontractid     = $this->input->post('newContractSel');
			$salestaffId       = $this->input->post('saletaff');
			$svcstaffId        = $this->input->post('svcstaff');
			$contractstartdate = $this->input->post('newcontractstartdate');

			$table = "clients";
            $arrayData = array(
					'isActive'           => $this->input->post('setActive'),
					'clientFirstName'    => $this->input->post('clientFirstName'),
					'clientLastName'     => $this->input->post('clientLastName'),
					'clientMembershipNo' => $this->input->post('clientMembershipNo'),
					'clientNRIC'         => $this->input->post('clientNRIC')
            );

            $client_id = $this->segi_model->insert_data($arrayData,$table);

			for ($i = 0; $i < count($newcontractid); $i++) { 

				$table = "contracts";
    		    $where = array('contractId' => $newcontractid[$i]); 
                $data_contract = $this->segi_model->get_specified_row($table, $where);
              
                $table = "contractfiles";
            	$arrayData = array(
									'contractId '           => $newcontractid[$i],
									'clientId'              => $client_id,
									'contractName'          => $data_contract['contractName'],
									'contractDescription'   => $data_contract['contractDescription'],                                
									'contractNotes'         => $data_contract['contractNotes'],
									'contractType'          => $data_contract['contractType'],
									'contractfilestartDate' => $contractstartdate[$i],
									'contractfiledueDate'   =>  date('Y-m-d', strtotime("+".$data_contract['membershipPeriod']." months", strtotime($contractstartdate[$i]))),
									'membershipPeriod'      => $data_contract['membershipPeriod'],
									'membershipcost'        => $data_contract['membershipcost'],
									'membershipsalecomm'    => $data_contract['membershipsalecomm'],
									'renewalert'            => $data_contract['renewalert'],
									'ptsession'             => $data_contract['ptsession'],
									'ptcostpersession'      => $data_contract['ptcostpersession'],
									'ptsalecomm'            => $data_contract['ptsalecomm'],
									'ptservicecomm'         => $data_contract['ptservicecomm'],
									'msgst'                 => $data_contract['msgst'],
									'ptgst'                 => $data_contract['ptgst'],
									'isActive'              => 0,
									'mssalestaffid'         => ($data_contract['contractType'] == '1' ) ? $salestaffId[$i] : '0',
									'ptsalestaffid'         => ($data_contract['contractType'] == '2' ) ? $salestaffId[$i] : '0',
									'ptservicestaffid'      => ($data_contract['contractType'] == '2' ) ? $svcstaffId[$i] : '0',
									'createdBy'             => $this->session->userdata('adminId')
            	);

				$this->segi_model->insert_data($arrayData,$table);
                
			}

			$this->segi_model->display_message("insert");

		}
		
	}

	public function ajax_populate_dropdown(){

		$action = $this->input->post('action');
    	$getId = $this->input->post('id');

    	if($action == 'GetStaff'){

    		$table = "admins";
    		$where = array('isActive' => 1);

        $data_admin = $this->segi_model->get_all_rows($table, $where);
        echo json_encode($data_admin);
    	
		}

	
	}
}

