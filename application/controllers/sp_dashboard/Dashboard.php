<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public $project = "sp_dashboard";
	public $category = "sp_dashboard";
	public $verbose_name = "Dashboard";
	public $verbose_name_plural = "Dashboard";
	
	public function __construct()
	{
		parent::__construct();

		login_required_spuser();

	}


	public function index()
	{
		$context=array(
			"title"					=>	"sp_dashboard",
			"sub_title"				=>	"Kontrol Paneli",
			"project" 				=> 	$this->project,
			"category" 				=>	$this->category,
			"view" 					=>  $this->router->fetch_method(),
			"user" 					=>	$this->user,
			"notification_alerts" 	=>	$this->notification_alerts,
			"ticket_alerts" 		=>	$this->ticket_alerts
			
		);
		$this->load->view("$this->project/base",$context);
	}

}
