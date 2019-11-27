<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

	public $project = "web";
	public $category = "pages";
	
	public function __construct()
	{
		parent::__construct();
	}


	public function homepage()
	{
		$context=array(
			"title"					=>	"Codeigniter 3x",
			"sub_title"				=>	"Codeigniter",
			"project" 				=> 	$this->project,
			"category" 				=>	$this->category,
			"view" 					=>  $this->router->fetch_method(),
			"view_footer_include"	=> "homepage_script",
		);
		$this->load->view("$this->project/base",$context);
	}



}
