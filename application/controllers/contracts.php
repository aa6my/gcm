<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contracts extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->output->enable_profiler(TRUE);
		//Do your magic here
	}

	/*public function list_contract(){

		$this->load->view('admin/a_contract_list');
	}*/

	public function list_active_contract(){
		
		$table = "contracts";
		$where = array(
			'contracts.isActive' => 1
		);
		$tableNameToJoin = array(
			'codetable',
			'admins'
		);
		$tableRelation = array(
			'contracts.contractType = codetable.codetableId',
			'contracts.createdBy = admins.adminId'
		);
		$data['contracts'] = $this->segi_model->get_all_rows($table, $where,$tableNameToJoin, $tableRelation);
		$this->load->view('admin/a_contract_list_active', $data);
	}

	public function list_inactive_contract(){
		
		$table = "contracts";
		$where = array(
			'contracts.isActive' => 0
		);
		$tableNameToJoin = array(
			'codetable',
			'admins'
		);
		$tableRelation = array(
			'contracts.contractType = codetable.codetableId',
			'contracts.createdBy = admins.adminId'
		);
		$data['contracts'] = $this->segi_model->get_all_rows($table, $where,$tableNameToJoin, $tableRelation);
		$this->load->view('admin/a_contract_list_inactive', $data);
	}

	public function add_contract(){

		$this->load->view('admin/a_contract_add');

		if($this->input->post('submit'))
		{
			$formData = $this->input->post();
			if($formData['contractType'] == "1")
            {
                    $msPeriod = $formData['msPeriod'];
                    $msCost = $formData['msCost'];
                    $msSaleComm = $formData['msSaleComm'];
                    $msGst = (isset($formData['addgstmscost']) == TRUE) ? 1 : 0;
                    
                    $ptSession = NULL;
                    $ptCostPerSession = NULL;
                    $ptSaleCommPerSession = NULL;
                    $ptServiceCommPerSession = NULL;
                    $ptGst = 0;
            }
            else 
            {
                    $msPeriod = NULL;
                    $msCost = NULL;
                    $msSaleComm = NULL;
                    $msGst = 0;
                    
                    $ptSession = $formData['ptSession'];
                    $ptCostPerSession = $formData['ptCostPerSession'];
                    $ptSaleCommPerSession = $formData['ptSaleCommPerSession'];
                    $ptServiceCommPerSession = $formData['ptServiceCommPerSession'];
                    $ptGst = (isset($formData['addgstptcost']) == TRUE) ? 1 : 0;
            }

            $table = "contracts";
			$arrayData = array(
				'contractName'        => $formData['contractName'],
				'contractDescription' => $formData['contractDetails'],
				'contractType'        => $formData['contractType'],
				'contractNotes'       => $formData['contractNotes'],
				'membershipPeriod'    => $msPeriod,
				'membershipcost'      => $msCost,
				'membershipsalecomm'  => $msSaleComm,
				'renewalert'          => $formData['msRenewAlert'],
				'ptsession'           => $ptSession,
				'ptcostpersession'    => $ptCostPerSession,
				'ptsalecomm'          => $ptSaleCommPerSession,
				'ptservicecomm'       => $ptServiceCommPerSession,
				'isActive'            => 1,
				'msgst'               => $msGst,
				'ptgst'               => $ptGst,
				'createdBy'           => $this->session->userdata('adminId')
			);

			$contract_id = $this->segi_model->insert_data($arrayData,$table);

			$table = "contracts";
			$fieldToFilter = "contractId";
			$highest_id = $this->segi_model->get_max_val($table, $fieldToFilter);

			if($highest_id < 1)
                $highest_id = 1;
            else 
            {
                $highest_id = $highest_id + 1;
            }

			if(isset($formData['outlet']) && !empty($formData['outlet']))
                {
                    if(is_array($formData['outlet']))
                    {
                        foreach($formData['outlet'] as $value)
                        {
                            
                            $table = "contractsoutlets";
							$arrayData = array(
								'contractId' => $contract_id,
								'outletId'   =>  $value
							);
							$this->segi_model->insert_data($arrayData,$table);
                        }
                    }
                }

            $messageType = "insert";
            $this->segi_model->display_message($messageType);
		}
	}

	
}

