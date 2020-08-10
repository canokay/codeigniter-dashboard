<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller {
	
	public $project = "sp_dashboard";
	public $category = "media";
	
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
			"title"		=>	"Ortamlar",
			"sub_title"	=>	"Ortam Listesi",
			"project" 	=> $this->project,
			"category" 				=>	$this->category,
			"view" 		=>  $this->router->fetch_method(),
			"user" 					=>	$this->user,
			"notification_alerts" 	=>	$this->notification_alerts,
			"ticket_alerts" 		=>	$this->ticket_alerts,
			"items" 	=>	$items,
			"DataTablesField"	=> "datatable",
			"page_title_add_button" => 1
		);
		$this->load->view("dashboard/base",$context);
	}

	public function create()
	{		
		$context=array(
			"title"		=>	"Ortam Ekle",
			"sub_title"	=>	"Yeni Ortam Ekle",
			"project" 	=> $this->project,
			"category" 				=>	$this->category,
			"view" 		=>	$this->router->fetch_method(),
			"user" 					=>	$this->user,
			"notification_alerts" 	=>	$this->notification_alerts,
			"ticket_alerts" 		=>	$this->ticket_alerts,
			"DropzoneField"	=>	array(
				"dropzone" => "dropzone"
			),
		);
		$this->load->view("dashboard/base",$context);
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
			"sub_title"	=>	"Ortam Güncelle",
			"project"	=>	$this->project,
			"category"	=>	$this->category,
			"view"		=>	$this->router->fetch_method(),
			"user" 					=>	$this->user,
			"notification_alerts" 	=>	$this->notification_alerts,
			"ticket_alerts" 		=>	$this->ticket_alerts,
			"DropzoneField"	=>	array(
				"dropzone" => "dropzone"
			),
			"item" 		=>	$item,
		);
		$this->load->view("dashboard/base",$context);
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
			"sub_title"	=>	"Ortam Güncelle",
			"project"	=>	$this->project,
			"category"	=>	$this->category,
			"view"		=>	$this->router->fetch_method(),
			"user" 					=>	$this->user,
			"notification_alerts" 	=>	$this->notification_alerts,
			"ticket_alerts" 		=>	$this->ticket_alerts,
			"DropzoneField"	=>	array(
				"dropzone" => "dropzone"
			),
			"item" 		=>	$item,
		);
		$this->load->view("dashboard/base",$context);
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
			

			if($update){
				$ToastField	=	array(
					"status"	=> "success",
					"title"		=>	"İşlem Başarılı.",
					"message"		=>"Başarılı bir şekilde güncellendi.",
				);
				$this->session->set_flashdata("ToastField", $ToastField);
				redirect(base_url("sp-admin/media"));
			} 
			else {
				$ToastField	=	array(
					"status"	=> "error",
					"title"		=>	"İşlem başarısız.",
					"message"		=>"Güncelleme olmadı :(",
				);
				$this->session->set_flashdata("ToastField", $ToastField);
				redirect(base_url("sp-admin/media"));
			}

		} 
		else {
			$context = new stdClass();
			$item = $this->MediaModel->get(
				array(
					"id"	=>	$id,
				)
			);
			$context=array(
				"title"		=>	"Ortamlar",
				"sub_title"	=>	"Ortam Listesi",
				"project" 	=>	$this->project,
				"category"	=>	$this->category,
				"view" 		=>	"list",
				"user" 					=>	$this->user,
				"notification_alerts" 	=>	$this->notification_alerts,
				"ticket_alerts" 		=>	$this->ticket_alerts,
				"item" 		=>	$item,
			);
			$this->load->view("dashboard/base",$context);
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



		if($delete){
			$ToastField	=	array(
				"status"	=> "success",
				"title"		=>	"İşlem Başarılı.",
				"message"		=>"Başarılı bir şekilde silindi.",
			);
			$this->session->set_flashdata("ToastField", $ToastField);
			redirect(base_url("sp-admin/media"));
		} 
		else {
			$ToastField	=	array(
				"status"	=> "error",
				"title"		=>	"İşlem başarısız.",
				"message"		=>"Silme işlemi olmadı :(",
			);
			$this->session->set_flashdata("ToastField", $ToastField);
			redirect(base_url("sp-admin/media"));
		}
	}

}
