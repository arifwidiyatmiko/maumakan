<?php 
	extract($_POST);
       		$file_gambar = $tmp_gambar = $tipe_gambar = $temp = $cek = "";
       		$temp = explode(".",$_FILES["image"]['name']);
       		$file_gambar = round(microtime(true)) . '.' . end($temp);

       		$temp_gambar = $_FILES["image"]["tmp_name"];
       		$tipe_gambar = $_FILES["image"]["type"];
       		$dir_upload = "C:\xampp\htdocs\maumakan\assets\upload";
       		$gambar_upload = $dir_upload . basename($file_gambar);
       		move_uploaded_file($tmp_gambar, $gambar_upload);
 
?>