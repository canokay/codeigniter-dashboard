<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model("PageModel");
	}



    public function homepage(){  
        $context=array(
			"title"		=>	"Anasayfa",
			"sub_title"	=>	"Anasayfa",
			"project" 	=>	"web",
			"category" 	=>  "pages",
			"view" 		=>  $this->router->fetch_method(),
		);
		$this->load->view("web/base",$context);
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
			"page"		=>	$page,
			);
		$this->load->view("web/base",$context);
		}
	}


	public function page_list()
	{
		$pages = $this->PageModel->get_all();

		$context=array(
			"title"		=>	"Sayfalar",
			"sub_title"	=>	"Sayfa Listesi",
			"project" 	=> "dashboard",
			"category" 	=>	"pages",
			"view" 		=>  $this->router->fetch_method(),
			"items" 	=>	$pages,
		);
		$this->load->view("dashboard/base",$context);
	}

	public function page_add()
	{
		if ($this->input->server('REQUEST_METHOD')=='GET'){		
			$context=array(
				"title"		=>	"Sayfa Ekle",
				"sub_title"	=>	"Yeni Sayfa Ekle",
				"project" 	=> "dashboard",
				"category" 	=>	"pages",
				"view" 		=>	$this->router->fetch_method(),
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
						"createdAt"     =>	date("Y-m-d H:i:s"),
					)
				);

				if($insert){
					redirect(base_url("admin/page"));
				} else {
					redirect(base_url("admin/page"));
				}

			} else {
				$context=array(
					"title"			=>	"Sayfa Ekle",
					"sub_title"		=>	"Yeni Sayfa Ekle",
					"project" 		=> 	"dashboard",
					"category" 		=>	"pages",
					"view" 			=>	"page_add",
					"form_error" 	=>	"true",
				);

				$this->load->view("dashboard/base",$context);

			}
		}
	}












	public function page_update()
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
				"project"	=>	"dashboard",
				"category"	=>	"pages",
				"view"		=>	$this->router->fetch_method(),
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
					redirect(base_url("admin/page"));
				}else {
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
					"project" 	=>	"dashboard",
					"category"	=>	"pages",
					"view" 		=>	"page_list",
					"item" 		=>	$item,
				);
				$this->load->view("dashboard/base",$context);
			}
    	}
	}
	

	public function page_delete()
	{
		$id = $this->uri->segment(4);
		$delete = $this->PageModel->delete(
            array(
                "id"	=>	$id
            )
		);
        if($delete){
            redirect(base_url("admin/page"));
        } else {
            redirect(base_url("admin/page"));
        }
	}

	public function isActiveSetter()
	{
		$id = $this->uri->segment(4);
        if($id){

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->PageModel->update(
                array(
                    "id"    => $id
                ),
                array(
                    "isActive"  => $isActive
                )
            );
        }
    }

	

}
