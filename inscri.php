<?php
include("config.php");
include("functions.php");

if (isset($_POST['name'])) $name= sec($_POST['name']); else $name= "";
if (isset($_POST['email']))$email= sec($_POST['email']); else $email= "";
if (isset($_POST['diploma']))$diploma= sec($_POST['diploma']); else $diploma= "";
if (isset($_POST['phone']))$phone= sec($_POST['phone']);// else $phone= 0;

if (strlen($phone)<8){
	$phone=0;
}

// echo $name;
// echo $email;
// echo $diploma;

if (($name!="")&&($email!="")&&($diploma!="")&&(is_numeric($phone))){

	$name = ucwords(mb_strtolower($name,'UTF-8'));
	$email = ucwords(mb_strtolower($email, 'UTF-8'));
	$diploma = mb_strtoupper($diploma,  'UTF-8');

	$insert_query = "INSERT INTO `etudiant` (`id`, `name`, `email`, `diploma`, `phone`) VALUES (NULL, '".$name."', '".$email."', '".$diploma."', '".$phone."')";

	$var = mysql_query($insert_query);
	echo 2;
}

else
	echo 1;

?>
