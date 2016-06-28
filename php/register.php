<?php
include 'Db.php';
include 'users.php';
$db = new Db();
$users = new Users();
$categories = array(
	0=>'Национален дворец на културата',
	1=>'Национална библиотека',
	2=>'Народен театър',
	3=>'Народно събрание',
	4=>'св. Александър Невски',
	5=>'Паметник на Цар Освободител',
	6=>'Софийски университет',
	7=>'Паметник на Цар Самуил'	
);


$db->connect();
if(!empty($_POST['register'])) {
	$username = $_POST['username'];
	$password = $_POST['userpass'];
	$confirm = $_POST['confirmpass'];
	if($password !== $confirm) {
		echo '<script type="text/javascript">
           window.location = "http://localhost/index.php"
      			</script>';
	} else {
		$password = password_hash($password, PASSWORD_DEFAULT);
		$query = "INSERT into `users`(`username`, `password`) VALUES ('".$username."', '".$password."')";
		$db->query($query);
	}
}
if(!empty($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['userpass'];
	$users->login($username, $password);	
}
if(isset($_POST['upload'])) {
	if(getimagesize($_FILES['image']['tmp_name']) == false){
		echo 'Please select an image!';
	} else {
		$image = addslashes($_FILES['image']['tmp_name']);
		$name = addslashes($_FILES['image']['name']); error_log(var_export($name, true));
		$image = file_get_contents($image);
		$image = base64_encode($image);error_log(var_export($image, true));
		$users->saveImage($name, $image);
	}
}

