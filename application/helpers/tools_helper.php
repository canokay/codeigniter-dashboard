<?php

function get_active_user(){

    $t = &get_instance();

    $user = $t->session->userdata("user");

    if($user && $user->is_active == 1)
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





function AutoSlugField($text){
    $turkce  = array("ç", "Ç", "ğ", "Ğ", "ü", "Ü", "ö", "Ö", "ı", "İ", "ş", "Ş", ".", ",", "!", "'", "\"", " ", "?", "*", "_", "|", "=", "(", ")", "[", "]", "{", "}");
    $convert = array("c", "c", "g", "g", "u", "u", "o", "o", "i", "i", "s", "s", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-");
    return strtolower(str_replace($turkce, $convert, $text));
}
