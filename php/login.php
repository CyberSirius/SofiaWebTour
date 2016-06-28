<?php
include 'Db.php';
$db = new Db();
$db->connect();
if(!empty($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['userpass'];
}