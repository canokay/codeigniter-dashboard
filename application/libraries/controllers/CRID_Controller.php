<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRID_Controller extends CI_Controller {

	public $project = "";
	public $category = "";
	public $verbose_name  = "";
	public $verbose_name_plural  = "";
	public $context  = "";
	public $fileds = "";
	public $editable_fileds = "";

	
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

    }


	public function list()
	{
		$items = $this->db->order_by('id','desc')->get($this->category)->result();
        
        $context['title'] = $this->verbose_name_plural;
        $context['sub_title'] = $this->verbose_name . " Listesi";
        $context['project'] = $this->project;
        $context['category'] = $this->category;
        $context['view'] = $this->router->fetch_method();
        $context['user'] = $this->user;
        $context['notification_alerts'] = $this->notification_alerts;
        $context['ticket_alerts'] = $this->ticket_alerts;
        $context['items'] = $items;
		$context["DataTablesField"] = "datatable";
		$context["page_title_add_button"] = 1;
		$this->load->view("dashboard/base",$context);
    }


	public function show()
	{
		if ($this->input->server('REQUEST_METHOD')=='GET'){
			
			$id = $this->uri->segment(3);

			$item = $this->db->where(array("id" => $id,))->get($this->category)->row();
			
			$context=array(
				"title"		=>	$this->verbose_name . " Güncelle",
				"sub_title"	=>	$this->verbose_name . " Güncelle",
				"project"	=>	$this->project,
				"category"	=>	$this->category,
				"view"		=>	$this->router->fetch_method(),
				"user" 					=>	$this->user,
				"notification_alerts" 	=>	$this->notification_alerts,
				"ticket_alerts" 		=>	$this->ticket_alerts,
				"CKEditorField"	=>	array(
					"description" => "description"
				),
				"item" 		=>	$item,
			);
			$this->load->view("dashboard/base",$context);
		}
	}

	
	public function create()
	{
		if ($this->input->server('REQUEST_METHOD')=='GET'){		

			$context=array(
				"title"		=>	$this->verbose_name . " Ekle",
				"sub_title"	=>	"Yeni " . $this->verbose_name . " Ekle",
				"project" 	=> $this->project,
				"category" 				=>	$this->category,
				"view" 		=>	$this->router->fetch_method(),
				"user" 					=>	$this->user,
				"notification_alerts" 	=>	$this->notification_alerts,
				"ticket_alerts" 		=>	$this->ticket_alerts,
				"CKEditorField"	=>	array(
					"description" => "description"
				),
			);
			$this->load->view("dashboard/base",$context);
		}

		else if ($this->input->server('REQUEST_METHOD')=='POST'){

			$this->load->library("form_validation");
/*
			foreach ($this->editable_fileds as $editable_filed) {
				echo $editable_filed[name];
				
			}
			die();*/
			foreach ($this->editable_fileds as $editable_filed) {
			$this->form_validation->set_rules($editable_filed[name], $ditable_filed[label], $ditable_filed[validation]);
			}

			$this->form_validation->set_message(
				array(
					"required"  => "<b>{field}</b> alanı doldurulmalıdır"
				)
			);

			$validate = $this->form_validation->run();

			if($validate){
				foreach ($this->fileds as $field) {
					$insert[$field]	=		$this->input->post($field);
				}
				$this->db->insert($this->category, $insert);

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

			}
			else {
				$context=array(
					"title"		=>	"Sayfa Ekle",
					"sub_title"	=>	"Yeni Sayfa Ekle",
					"project"	=>	$this->project,
					"category"	=>	$this->category,
					"view"		=>	$this->router->fetch_method(),
					"user" 					=>	$this->user,
					"notification_alerts" 	=>	$this->notification_alerts,
					"ticket_alerts" 		=>	$this->ticket_alerts,
					"CKEditorField"	=>	array(
						"description" => "description"
					),
					"item" 		=>	$item,
					"form_errors"	=> validation_errors(),
				);
				$this->load->view("dashboard/base",$context);

			}
		}
	}






	public function delete()
	{
		$id = $this->uri->segment(3);
        $delete = $this->db->where((
            array(
                "id"	=>	$id
            )
        ))->delete($this->category);
        
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