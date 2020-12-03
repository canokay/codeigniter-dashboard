<?php

function get_active_user(){

    $t = &get_instance();

    $user = $t->session->userdata("user");

    if($user && $user->is_active == 1 && $user->is_superuser == 0)
        return $user;
    else
        return false;

}


function get_notactive_user(){

    $t = &get_instance();

    $user = $t->session->userdata("user");

    if($user && $user->is_active == 0)
        return $user;
    else
        return false;

}





function get_superuser_user(){

    $t = &get_instance();

    $user = $t->session->userdata("user");

    if($user && $user->is_active == 1 && $user->is_superuser == 1)
        return $user;
    else
        return false;

}



function login_required($redirect_field_name = "/login"){
    if(!get_active_user()){
        redirect(base_url($redirect_field_name));
    }
    else{
        $t = &get_instance();
        $t->user = get_active_user();
    }
}



function login_required_spuser($redirect_field_name = "/login"){
    if(!get_superuser_user()){
        redirect(base_url($redirect_field_name));
    }
    else{
        $t = &get_instance();
        $t->user = get_superuser_user();
    }
}


function permission_required($codename){
    $t = &get_instance();

    $t->load->model("PermissionModel");
    $t->load->model("UserPermissionModel");

    $get_permission = $t->PermissionModel->get(
        array(
            "codename"	=> $codename,
        )
    );

    $control_permission = $t->UserPermissionModel->get(
        array(
            "user_id"	=> $t->user->id,
            "permission_id"	=> $get_permission->id,
        )
    );

    if(!$control_permission){
        $t->load->view("web/error");
    }
    

}

