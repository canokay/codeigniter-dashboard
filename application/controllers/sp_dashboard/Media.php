<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller {
	
	public $project = "sp_dashboard";
	public $category = "media";
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model("DashboardModel");

		if(!get_active_user()){
            redirect(base_url("/login"));
		}
		else{
			$this->user = get_active_user();
			$this->notification_alerts = $this->DashboardModel->get_notification_alerts();
			$this->ticket_alerts = $this->DashboardModel->get_ticket_alerts();
		}

		$this->load->model("MediaModel");
	}


	public function list()
	{
		$pages = $this->MediaModel->get_all();

		$context=array(
			"title"		=>	"Ortamlar",
			"sub_title"	=>	"Ortam Listesi",
			"project" 	=> $this->project,
			"category" 				=>	$this->category,
			"view" 		=>  $this->router->fetch_method(),
			"user" 					=>	$this->user,
			"notification_alerts" 	=>	$this->notification_alerts,
			"ticket_alerts" 		=>	$this->ticket_alerts,
			"items" 	=>	$pages,
			"DataTablesField"	=> "datatable",
		);
		$this->load->view("dashboard/base",$context);
	}

	public function add()
	{
		if ($this->input->server('REQUEST_METHOD')=='GET'){		
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

		else if ($this->input->server('REQUEST_METHOD')=='POST'){

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
/*
				$data = $this->MediaModel->get(
					array(
						"name"	=>	$this->upload->data("file_name"),
						"url"	=>	"media/" . $this->upload->data("file_name"),
					)
				);
				
				echo json_encode($data);
*/
			}
			else{
				/*
				$ToastField	=	array(
					"status"	=> "error",
					"title"		=>	"Yükleme başarısız.",
					"message"		=>"Yükleme olamadı :(",
				);
				$this->session->set_flashdata("ToastField", $ToastField);*/
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
					"sub_title"		=>	"Yeni Ortam Ekle",
					"project" 		=> 	$this->project,
					"category" 		=>	"pages",
					"view" 			=>	"add",
					"form_error" 	=>	"true",
				);

				$this->load->view("dashboard/base",$context);

			}
			*/
		}
	}


	public function update()
	{
		if ($this->input->server('REQUEST_METHOD')=='GET'){
			
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
				"category"	=>	"pages",
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
		else if ($this->input->server('REQUEST_METHOD')=='POST'){

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
					"sub_title"	=>	"Ortam Listesi",
					"project" 	=>	$this->project,
					"category"	=>	"pages",
					"view" 		=>	"list",
					"user" 					=>	$this->user,
					"notification_alerts" 	=>	$this->notification_alerts,
					"ticket_alerts" 		=>	$this->ticket_alerts,
					"item" 		=>	$item,
				);
				$this->load->view("dashboard/base",$context);
			}
    	}
	}
	

	public function delete()
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
