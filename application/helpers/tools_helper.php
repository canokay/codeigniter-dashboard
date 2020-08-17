<?php

function AutoSlugField($text){
    $turkce  = array("ç", "Ç", "ğ", "Ğ", "ü", "Ü", "ö", "Ö", "ı", "İ", "ş", "Ş", ".", ",", "!", "'", "\"", " ", "?", "*", "_", "|", "=", "(", ")", "[", "]", "{", "}");
    $convert = array("c", "c", "g", "g", "u", "u", "o", "o", "i", "i", "s", "s", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-");
    return strtolower(str_replace($turkce, $convert, $text));
}


function get_object_or_404($data){
    if(empty($data)){
        $t = &get_instance();
        return $t->load->view("web/error");
    }
}


function toast_field_insert($insert, $url = "", $success_message = array(), $error_message = array()){
    $t = &get_instance();
    if(empty($url)){
        $url = $t->uri->segment(1) . "/" .  $t->uri->segment(2);
    }
    if(empty($success_message)){
        $success_message = array(
            "status"	=> "success",
            "title"		=>	"İşlem başarılı.",
            "message"		=>"Başarılı bir şekilde kayıt oldu.",
        );
    }
    if(empty($error_message)){
        $error_message = array(
            "status"	=> "error",
            "title"		=>	"İşlem başarısız.",
            "message"		=>"İşlem kayıt olamadı :(",
        );
    }
    if($insert){
        $ToastField	=	$success_message;
        $t->session->set_flashdata("ToastField", $ToastField);
        redirect(base_url($url));
    } 
    else {
        $ToastField	=	$error_message;
        $t->session->set_flashdata("ToastField", $ToastField);
        redirect(base_url($url));
    }
}


function toast_field_update($update,$url = "", $success_message = array(), $error_message = array()){
    $t = &get_instance();
    if(empty($url)){
        $url = $t->uri->segment(1) . "/" .  $t->uri->segment(2);
    }
    if(empty($success_message)){
        $success_message = array(
            "status"	=> "success",
            "title"		=>	"İşlem Başarılı.",
            "message"		=>"Başarılı bir şekilde güncellendi.",
        );
    }
    if(empty($error_message)){
        $error_message = array(
            "status"	=> "error",
            "title"		=>	"İşlem başarısız.",
            "message"		=>"Güncelleme olmadı :(",
        );
    }
    if($update){
        $ToastField	=	$success_message;
        $t->session->set_flashdata("ToastField", $ToastField);
        redirect(base_url($url));
    } 
    else {
        $ToastField	=	$error_message;
        $t->session->set_flashdata("ToastField", $ToastField);
        redirect(base_url($url));
    }
}

function toast_field_delete($delete,$url = "", $success_message = array(), $error_message = array()){
    $t = &get_instance();
    if(empty($url)){
        $url = $t->uri->segment(1) . "/" .  $t->uri->segment(2);
    }
    if(empty($success_message)){
        $success_message = array(
            "status"	=> "success",
            "title"		=>	"İşlem Başarılı.",
            "message"		=>"Başarılı bir şekilde silindi.",
        );
    }
    if(empty($error_message)){
        $error_message = array(
            "status"	=> "error",
            "title"		=>	"İşlem başarısız.",
            "message"		=>"Silme işlemi olmadı :(",
        );
    }
    if($delete){
        $ToastField	=	$success_message;
        $t->session->set_flashdata("ToastField", $ToastField);
        redirect(base_url($url));
    } 
    else {
        $ToastField	=	$error_message;
        $t->session->set_flashdata("ToastField", $ToastField);
        redirect(base_url($url));
    }
}

function response_and_redirect($response, $url = ""){
    $t = &get_instance();
    if(empty($url)){
        $url = $t->uri->segment(1) . "/" .  $t->uri->segment(2);
    }
    if($response){
        redirect(base_url($url));
    } 
    else {
        redirect(base_url($url));
    }
}

function create_url(){
    $t = &get_instance();
    return base_url($t->uri->segment(1) . "/" . $t->uri->segment(2) ."/create");
}