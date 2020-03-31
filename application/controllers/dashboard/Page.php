<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
	
	public $project = "dashboard";
	public $category = "page";
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model("NotificationModel");

		if(!get_active_user()){
            redirect(base_url("/login"));
		}
		else{
			$this->user = get_active_user();
			$this->notification_alerts = $this->NotificationModel->get_all();
		}

		$this->load->model("PageModel");
	}




	public function page(){
		$page_url = $this->uri->segment(1);
		$page = $this->PageModel->get(
			array(
				"url"	=> $page_url,
			)
		);
		if(empty($page)){
			echo "Site 404 Error";
		}
		else{
		$context=array(
			"title"		=>	"Anasayfa",
			"sub_title"	=>	"Anasayfa",
			"project" 	=>	"web",
			"category" 	=>  "pages",
			"view" 		=>  $this->router->fetch_method(),
			"user" 					=>	$this->user,
			"notification_alerts" 	=>	$this->notification_alerts,
			"page"		=>	$page,
			);
		$this->load->view("web/base",$context);
		}
	}


	public function list()
	{
		$pages = $this->PageModel->get_all();

		$context=array(
			"title"		=>	"Sayfalar",
			"sub_title"	=>	"Sayfa Listesi",
			"project" 	=> $this->project,
			"category" 				=>	$this->category,
			"view" 		=>  $this->router->fetch_method(),
			"user" 					=>	$this->user,
			"notification_alerts" 	=>	$this->notification_alerts,
			"items" 	=>	$pages,
			"DataTablesField"	=> "datatable",
		);
		$this->load->view("dashboard/base",$context);
	}

	public function add()
	{
		if ($this->input->server('REQUEST_METHOD')=='GET'){		
			$context=array(
				"title"		=>	"Sayfa Ekle",
				"sub_title"	=>	"Yeni Sayfa Ekle",
				"project" 	=> $this->project,
				"category" 				=>	$this->category,
				"view" 		=>	$this->router->fetch_method(),
				"user" 					=>	$this->user,
			"notification_alerts" 	=>	$this->notification_alerts,
				"CKEditorField"	=>	array(
					"description" => "description"
				),
			);
			$this->load->view("dashboard/base",$context);
		}

		else if ($this->input->server('REQUEST_METHOD')=='POST'){

			$this->load->library("form_validation");

			$this->form_validation->set_rules("title", "Başlık", "required|trim");

			$this->form_validation->set_message(
				array(
					"required"  => "<b>{field}</b> alanı doldurulmalıdır"
				)
			);

			$validate = $this->form_validation->run();

			if($validate){
				$insert = $this->PageModel->add(
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
					redirect(base_url("admin/page"));
				} else {
					$ToastField	=	array(
						"status"	=> "error",
						"title"		=>	"İşlem başarısız.",
						"message"		=>"İşlem kayıt olamadı :(",
					);
					$this->session->set_flashdata("ToastField", $ToastField);
					redirect(base_url("admin/page"));
				}

			} else {
				$context=array(
					"title"			=>	"Sayfa Ekle",
					"sub_title"		=>	"Yeni Sayfa Ekle",
					"project" 		=> 	$this->project,
					"category" 		=>	"pages",
					"view" 			=>	"add",
					"form_error" 	=>	"true",
				);

				$this->load->view("dashboard/base",$context);

			}
		}
	}


	public function update()
	{
		if ($this->input->server('REQUEST_METHOD')=='GET'){
			
			$id = $this->uri->segment(3);

			$item = $this->PageModel->get(
				array(
					"id"	=> $id,
				)
			);
			
			$context=array(
				"title"		=>	"Etkinlik Güncelle",
				"sub_title"	=>	"Etkinlik Güncelle",
				"project"	=>	$this->project,
				"category"	=>	"pages",
				"view"		=>	$this->router->fetch_method(),
				"user" 					=>	$this->user,
			"notification_alerts" 	=>	$this->notification_alerts,
				"CKEditorField"	=>	array(
					"description" => "description"
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

				$update =$this->PageModel->update(
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
					redirect(base_url("admin/page"));
				} 
				else {
					$ToastField	=	array(
						"status"	=> "error",
						"title"		=>	"İşlem başarısız.",
						"message"		=>"Güncelleme olmadı :(",
					);
					$this->session->set_flashdata("ToastField", $ToastField);
					redirect(base_url("admin/page"));
				}

			} else {
				$context = new stdClass();
				$item = $this->PageModel->get(
					array(
						"id"	=>	$id,
					)
				);
				$context=array(
					"title"		=>	"Sayfalar",
					"sub_title"	=>	"Sayfa Listesi",
					"project" 	=>	$this->project,
					"category"	=>	"pages",
					"view" 		=>	"list",
					"user" 					=>	$this->user,
			"notification_alerts" 	=>	$this->notification_alerts,
					"item" 		=>	$item,
				);
				$this->load->view("dashboard/base",$context);
			}
    	}
	}
	

	public function delete()
	{
		$id = $this->uri->segment(4);
		$delete = $this->PageModel->delete(
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
			redirect(base_url("admin/page"));
		} 
		else {
			$ToastField	=	array(
				"status"	=> "error",
				"title"		=>	"İşlem başarısız.",
				"message"		=>"Silme işlemi olmadı :(",
			);
			$this->session->set_flashdata("ToastField", $ToastField);
			redirect(base_url("admin/page"));
		}
	}

}
