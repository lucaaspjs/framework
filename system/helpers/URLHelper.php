<?php

function base_url($uri = NULL){
 require('application/config/URLHelper.php');
 return $config['base_url'].$uri;
}

function base_assets(){
 return base_url().'assets/';
}

function redirect($uri = NULL){
 header("location:".base_url($uri));
}
