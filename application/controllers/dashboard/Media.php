<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller {
	
	public $project = "dashboard";
	public $category = "media";
	public $verbose_name = "Ortam";
	public $verbose_name_plural = "Ortamlar";
	
	public function __construct()
	{
		parent::__construct();

		login_required();

		$this->load->model("MediaModel");
	}


	public function index()
	{
		$pages = $this->MediaModel->get_all();

		$context=array(
			"title"		=>	$this->verbose_name_plural,
			"card_title"	=>	$this->verbose_name . " Listesi",
			"items" 	=>	$pages,
			"DataTablesField"	=> "datatable",
			"page_title_add_button" => 1
		);
		render_view($context);
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
		render_view($context);		
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

		/*

		$this->load->library("form_validation");

		$this->form_validation->set_rules("title", "Başlık", "required|trim");

		$this->form_validation->set_message(
			array(
				"required"  => "<b>{field}</b> alanı doldurulmalıdır"
			)
		);

		$validate = $this->form_validation->run();

		if($validate){
			$insert = $this->MediaModel->add(
				array(
					"title"         =>	$this->input->post("title"),
					"description"   =>	$this->input->post("description"),
					"url"           =>	AutoSlugField($this->input->post("title")),
					"isActive"      =>	1,
					"created_at"     =>	date("Y-m-d H:i:s"),
				)
			);

			if($insert){
				$ToastField	=	array(
					"status"	=> "success",
					"title"		=>	"İşlem Başarılı.",
					"message"		=>"Başarılı bir şekilde kayıt oldu.",
				);
				$this->session->set_flashdata("ToastField", $ToastField);
				redirect(base_url("admin/media"));
			} else {
				$ToastField	=	array(
					"status"	=> "error",
					"title"		=>	"İşlem başarısız.",
					"message"		=>"İşlem kayıt olamadı :(",
				);
				$this->session->set_flashdata("ToastField", $ToastField);
				redirect(base_url("admin/media"));
			}

		} else {
			$context=array(
				"title"			=>	"Ortam Ekle",
				"card_title"		=>	"Yeni Ortam Ekle",
				"project" 		=> 	$this->project,
				"category"	=>	$this->category,
				"view" 			=>	"add",
				"form_error" 	=>	"true",
			);

			render_view($context);

		}
		*/
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
			render_view($context);

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
			render_view($context);


	}

	public function update(){

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
				redirect(base_url("admin/media"));
			} 
			else {
				$ToastField	=	array(
					"status"	=> "error",
					"title"		=>	"İşlem başarısız.",
					"message"		=>"Güncelleme olmadı :(",
				);
				$this->session->set_flashdata("ToastField", $ToastField);
				redirect(base_url("admin/media"));
			}

		} else {
			$context = new stdClass();
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
				"notification_alerts" 	=>	$this->notification_alerts,
				"ticket_alerts" 		=>	$this->ticket_alerts,
				"item" 		=>	$item,
			);
			render_view($context);
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
			redirect(base_url("admin/media"));
		} 
		else {
			$ToastField	=	array(
				"status"	=> "error",
				"title"		=>	"İşlem başarısız.",
				"message"		=>"Silme işlemi olmadı :(",
			);
			$this->session->set_flashdata("ToastField", $ToastField);
			redirect(base_url("admin/media"));
		}
	}

}
