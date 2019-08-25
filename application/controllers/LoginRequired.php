<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginRequired extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		if(!get_active_user()){
            redirect(base_url("/"));
        }
	}


	public function login_required_example()
	{
		$this->load->view('login_required');
	}
}
