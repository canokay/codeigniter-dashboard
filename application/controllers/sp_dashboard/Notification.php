<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {

	public $project = "sp_dashboard";
	public $category = "notification";
	public $verbose_name = "Bildirim";
	public $verbose_name_plural = "Bildirimler";
	

	public function __construct(){
		parent::__construct();

		login_required_spuser();
	
		$this->load->model("NotificationModel");

	}

	public function index(){
		$items = $this->NotificationModel->get_all();

		$context=array(
			"title"		=>	"Bildirim",
			"card_title"	=>	"Bildirim Listesi",
			"items" 	=>	$items,
			"DataTablesField"	=> "datatable",
			"page_title_add_button" => 1
		);
		render_dashboard_view($context);
	}

	public function create(){
		$context=array(
			"title"		=>	"Bildirim Ekle",
			"card_title"	=>	"Yeni Bildirim Ekle",
			"CKEditorField"	=>	array(
				"description" => "description"
			),
		);
		render_dashboard_view($context);
	}

	public function store()
	{
		$this->load->library("form_validation");

		$this->form_validation->set_rules("title", "Başlık", "required|trim");
		$this->form_validation->set_rules("description", "Bildirim", "required|trim");

		$this->form_validation->set_message(
			array(
				"required"  => "<b>{field}</b> alanı doldurulmalıdır"
			)
		);

		$validate = $this->form_validation->run();

		if($validate){
			$insert = $this->NotificationModel->add(
				array(
					"title"         	 =>	AutoSlugField($this->input->post("title")),
					"description"         	 =>	$this->input->post("description"),
				)
			);

			toast_field_insert($insert);

		} 
		else {
			$context=array(
				"title"		=>	"Bildirim Ekle",
				"card_title"	=>	"Yeni Bildirim Ekle",
				"CKEditorField"	=>	array(
					"description" => "description"
				),
				"form_errors"	=> validation_errors(),
			);
			render_dashboard_view($context);

		}
	}

	public function show(){
			
		$id = $this->uri->segment(3);

		$notification = $this->NotificationModel->get(
			array(
				"id"	=> $id,
			)
		);

		$context=array(
			"title"		=>	$notification->title,
			"card_title"	=>	$notification->title,
			"CKEditorField"	=>	array(
				"description" => "description"
			),
			"notification" 		=>	$notification,
		);
		render_dashboard_view($context);
	}

	public function edit(){
			
		$id = $this->uri->segment(3);

		$notification = $this->NotificationModel->get(
			array(
				"id"	=> $id,
			)
		);

		$context=array(
			"title"		=>	$notification->title,
			"card_title"	=>	$notification->title,
			"CKEditorField"	=>	array(
				"description" => "description"
			),
			"notification" 		=>	$notification,
		);
		render_dashboard_view($context);
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

			$update =$this->NotificationModel->update(
				array(
					"id"    => $id
				),
				array(
					"title"         => AutoSlugField($this->input->post("title")),
				)
			);
							
			toast_field_update($update);

		} 
		else {
			$id = $this->uri->segment(3);

			$notification = $this->NotificationModel->get(
				array(
					"id"	=> $id,
				)
			);

			$context=array(
				"title"		=>	$notification->title,
				"card_title"	=>	$notification->title,
				"CKEditorField"	=>	array(
					"description" => "description"
				),
				"notification" 		=>	$notification,
				"form_errors"	=> validation_errors(),
			);
			render_dashboard_view($context);
		}
	}

	

	public function destroy(){
		$id = $this->uri->segment(4);
		$delete = $this->NotificationModel->delete(
            array(
                "id"	=>	$id
            )
		);

		toast_field_delete($delete);
	}


}