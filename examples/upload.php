<?php
//File used to save audio stream into PHP
/*
Develop By : Hitesh Siddhapura (siddhapura.hitesh@gmail.com)
*/

//print_r($_FILES);


  $save_folder = dirname(__FILE__) . "/audio";
	if(! file_exists($save_folder)) {
	  if(! mkdir($save_folder)) {
		die("failed to create save folder $save_folder");
	  }
	 }
	
	$key = 'filename';
	$tmp_name = $_FILES["audiofile"]["tmp_name"];
	$upload_name = $_FILES["audiofile"]["name"];
	$type = $_FILES["audiofile"]["type"];
	$filename = "$save_folder/$upload_name";
	$saved = 0;
	if(($type == 'audio/x-wav' || $type == 'application/octet-stream') && preg_match('/^[a-zA-Z0-9_\-]+\.wav$/', $upload_name) ) {
		
	  $saved = move_uploaded_file($tmp_name, $filename) ? 1 : 0;
	 }
	
	  print ($saved ? "Saved" : 'Not saved');
	
	exit;
?>
