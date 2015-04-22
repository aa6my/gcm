<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->output->enable_profiler(TRUE);
		//Do your magic here
	}

	public function index()
	{
		$this->load->view('admin/a_login');

		if($this->input->post('submit') && $this->input->post('submit') == "signIn"){

			$formData = $this->input->post();
			$table = "admins";
			$where = array(
						'adminEmail' => $formData['adminEmail']
						);
			$checkActive = $this->segi_model->get_specified_row($table, $where);

			// If the account is active - allow the login
			if ($checkActive['isActive'] == '1') {

				$encodeKey = 'XQ9b1q6V1q8bnwY0T6l66G';
				$encoded   = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($encodeKey), $formData['password'], MCRYPT_MODE_CBC, md5(md5($encodeKey))));
				$table     = "admins";
				$where = array(
						'adminEmail' => $formData['adminEmail'],
						'password'   => $encoded
						);
				$admin = $this->segi_model->get_specified_row($table, $where);

				if(!empty($admin) && isset($admin)){

					$sessionData = array(
									'adminId'        => $admin['adminId'],
									'adminEmail'     => $admin['adminEmail'],
									'adminFirstName' => $admin['adminFirstName'],
									'adminLastName'  => $admin['adminLastName'],
									'isAdmin'        => $admin['isAdmin'],
									'outletId'       => $admin['outletId'],
									'adminRole'      => $admin['adminRole'],
									'menuShown'      => $admin['menuShown'],
									'buttonShown'    => $admin['buttonShown']
									);
					
					$this->session->set_userdata( $sessionData );
					redirect('dashboard');
						
				}
				else{
					$messageType = "login_match";
					$urlToGo = "auth/index";
					$this->segi_model->display_message($messageType, $urlToGo);
				}
			}
			else if($checkActive['isActive'] == '0') {

				$messageType = "login_inactive";
				$urlToGo = "auth/index";
				$this->segi_model->display_message($messageType, $urlToGo);			
			}
			else{

				$messageType = "login_account";
				$urlToGo = "auth/index";
				$this->segi_model->display_message($messageType, $urlToGo);
			}
		}
	}

	public function logout(){

		$this->session->sess_destroy();
		redirect('auth');
	}
}

