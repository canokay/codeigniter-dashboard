<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller {
	
	public $project = "sp_dashboard";
	public $category = "media";
	public $verbose_name = "Ortam";
	public $verbose_name_plural = "Ortamlar";
	
	public function __construct()
	{
		parent::__construct();

		login_required_spuser();

		$this->load->model("MediaModel");
	}


	public function index()
	{
		$items = $this->MediaModel->get_all();

		$context=array(
			"title"		=>	$this->verbose_name_plural,
			"card_title"	=>	$this->verbose_name . " Listesi",
			"items" 	=>	$items,
			"DataTablesField"	=> "datatable",
			"page_title_add_button" => 1
		);
		render_dashboard_view($context);
	}

	public function create()
	{		
		$context=array(
			"title"		=>	$this->verbose_name . " Oluştur",
			"card_title"	=>	$this->verbose_name . " Ekle",
			"DropzoneField"	=>	array(
				"dropzone" => "dropzone"
			),
		);
		render_dashboard_view($context);
	}

	public function store()
	{
		$config ['upload_path'] = 'media';
		$config ['allowed_types'] = 'jpg|png';
		

		$this->load->library("upload", $config);

		if($this->upload->do_upload("file")){

			$insert = $this->MediaModel->add(
				array(
					"name"	=>	$this->upload->data("file_name"),
					"url"	=>	"media/" . $this->upload->data("file_name"),
				)
			);
		}
		else{
			echo "Error";
		}

	}



	public function show()
	{	
		$id = $this->uri->segment(3);

		$item = $this->MediaModel->get(
			array(
				"id"	=> $id,
			)
		);
		
		$context=array(
			"title"		=>	"Ortam Güncelle",
			"card_title"	=>	"Ortam Güncelle",
			"DropzoneField"	=>	array(
				"dropzone" => "dropzone"
			),
			"item" 		=>	$item,
		);
		render_dashboard_view($context);
	}
	public function edit()
	{	
		$id = $this->uri->segment(3);

		$item = $this->MediaModel->get(
			array(
				"id"	=> $id,
			)
		);
		
		$context=array(
			"title"		=>	"Ortam Güncelle",
			"card_title"	=>	"Ortam Güncelle",
			"DropzoneField"	=>	array(
				"dropzone" => "dropzone"
			),
			"item" 		=>	$item,
		);
		render_dashboard_view($context);
	}

	public function update()
	{

		$id = $this->uri->segment(3);
		$this->load->library("form_validation");
		$this->form_validation->set_rules("title", "Başlık", "required|trim");
		$this->form_validation->set_message(
			array(
				"required"  => "<b>{field}</b> alanı doldurulmalıdır"
			)
		);

		$validate = $this->form_validation->run();

		if($validate){

			$update =$this->MediaModel->update(
				array(
					"id"    => $id
				),
				array(
					"title"         => $this->input->post("title"),
					"description"   => $this->input->post("description"),
					"url"           => AutoSlugField($this->input->post("title")),
				)
			);
			
			toast_field_update($update);

		} 
		else {
			
			$item = $this->MediaModel->get(
				array(
					"id"	=>	$id,
				)
			);
			$context=array(
				"title"		=>	"Ortamlar",
				"card_title"	=>	"Ortam Listesi",
				"project" 	=>	$this->project,
				"category"	=>	$this->category,
				"view" 		=>	"list",
				"user" 					=>	$this->user,
				"item" 		=>	$item,
			);
			render_dashboard_view($context);
		}
	}
	
	

	public function destroy()
	{
		$id = $this->uri->segment(4);

		$get_image = $this->MediaModel->get(
            array(
                "id"	=>	$id
			)
		);

		@unlink($get_image->url);  
		$delete = $this->MediaModel->delete(
            array(
                "id"	=>	$id
			)
		);


		toast_field_delete($delete);
	}

}
