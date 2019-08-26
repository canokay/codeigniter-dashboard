<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public $project = "";
	public $category = "";
	
	public function __construct()
	{
		parent::__construct();
		if(!get_active_user()){
            redirect(base_url("/login"));
        }
		$this->project = "dashboard";
		$this->category = "example";
	}


	public function homepage()
	{
		$context=array(
			"title"					=>	"Dashboard",
			"sub_title"				=>	"Kontrol Paneli",
			"project" 				=> 	$this->project,
			"category" 				=>	$this->category,
			"view" 					=>  $this->router->fetch_method(),
			"view_footer_include"	=> "homepage_footer",
		);
		$this->load->view("$this->project/base",$context);
	}


	public function animations()
	{
		$context=array(
			"title"					=>	"Dashboard",
			"sub_title"				=>	"Kontrol Paneli",
			"project" 				=> 	$this->project,
			"category" 				=>	$this->category,
			"view" 					=>  $this->router->fetch_method(),
		);
		$this->load->view("$this->project/base",$context);
	}

	public function borders()
	{
		$context=array(
			"title"					=>	"Dashboard",
			"sub_title"				=>	"Kontrol Paneli",
			"project" 				=> 	$this->project,
			"category" 				=>	$this->category,
			"view" 					=>  $this->router->fetch_method(),
		);
		$this->load->view("$this->project/base",$context);
	}


	public function buttons()
	{
		$context=array(
			"title"					=>	"Dashboard",
			"sub_title"				=>	"Kontrol Paneli",
			"project" 				=> 	$this->project,
			"category" 				=>	$this->category,
			"view" 					=>  $this->router->fetch_method(),
		);
		$this->load->view("$this->project/base",$context);
	}


	public function cards()
	{
		$context=array(
			"title"					=>	"Dashboard",
			"sub_title"				=>	"Kontrol Paneli",
			"project" 				=> 	$this->project,
			"category" 				=>	$this->category,
			"view" 					=>  $this->router->fetch_method(),
		);
		$this->load->view("$this->project/base",$context);
	}


	public function charts()
	{
		$context=array(
			"title"					=>	"Dashboard",
			"sub_title"				=>	"Kontrol Paneli",
			"project" 				=> 	$this->project,
			"category" 				=>	$this->category,
			"view" 					=>  $this->router->fetch_method(),
		);
		$this->load->view("$this->project/base",$context);
	}

	public function colors()
	{
		$context=array(
			"title"					=>	"Dashboard",
			"sub_title"				=>	"Kontrol Paneli",
			"project" 				=> 	$this->project,
			"category" 				=>	$this->category,
			"view" 					=>  $this->router->fetch_method(),
		);
		$this->load->view("$this->project/base",$context);
	}


	public function tables()
	{
		$context=array(
			"title"					=>	"Dashboard",
			"sub_title"				=>	"Kontrol Paneli",
			"project" 				=> 	$this->project,
			"category" 				=>	$this->category,
			"view" 					=>  $this->router->fetch_method(),
		);
		$this->load->view("$this->project/base",$context);
	}


	public function other()
	{
		$context=array(
			"title"					=>	"Dashboard",
			"sub_title"				=>	"Kontrol Paneli",
			"project" 				=> 	$this->project,
			"category" 				=>	$this->category,
			"view" 					=>  $this->router->fetch_method(),
		);
		$this->load->view("$this->project/base",$context);
	}


}
