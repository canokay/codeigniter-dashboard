<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

	public $project = "web";
	public $category = "pages";
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model("PageModel");
	}


	public function index()
	{
		$context=array(
			"title"					=>	"Codeigniter 3x",
			"card_title"				=>	"Codeigniter",
			"project" 				=> 	$this->project,
			"category" 				=>	$this->category,
			"view" 					=>  $this->router->fetch_method()
		);
	render_view($context);
	}

	public function show()
	{
		
		$id = $this->uri->segment(1);

		$item = $this->PageModel->get(
			array(
				"url"	=> $id,
			)
		);

		get_object_or_404($item);
		
		
	}



}
