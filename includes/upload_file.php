<?php
function upload_file(){
	$allowedExts = array("jpg");
	$temp = explode(".", $_FILES["file"]["name"]);
	$extension = end($temp);
	if ($_FILES["file"]["type"] == "image/jpg" && in_array($extension, $allowedExts))
	  {
	  if ($_FILES["file"]["error"] > 0)
		{
		echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
		}
	  else
		{
		echo "Upload: " . $_FILES["file"]["name"] . "<br>";
		echo "Type: " . $_FILES["file"]["type"] . "<br>";
		echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
		echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
		$target = 'images/' . global $id;
		move_uploaded_file($_FILES['uploaded']['tmp_name'], $target);
		}
	  }
	else
	{
	echo "Invalid file, only .jpg allowed";
	}
}
function findexts ($filename) 
	{ 
		$filename = strtolower($filename) ; 
		$exts = split("[/\\.]", $filename) ; 
		$n = count($exts)-1; 
		$exts = $exts[$n]; 
		return $exts; 
	} 
?>