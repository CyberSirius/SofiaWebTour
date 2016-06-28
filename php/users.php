<?php
class Users extends Db{
	public  $isLogged = false;
	public  $userData = array();
	
	public function login($username, $password) {
		//session_start();
		
		$status = false;
		$query = "SELECT * FROM `users` WHERE `username`='".$username."'";
		$result = $this->select($query);
		$userData = $result[0];
		if(!empty($userData)) {
			$status = true;
			if(!password_verify($password, $userData['password'])) {
				$status = false;
				$this->userData = array();
				$this->isLogged = $status;
				//$_SESSION["newsession"]=array();
			} else {
				$status = true;
				$this->isLogged = $status;
 				$this->userData = $userData;
 				//$_SESSION["newsession"]=$userData;
			}
		}
		setcookie('username', $userData['username']);
		$this->isLogged = (bool) $status;
		return $this->isLogged;
	}
	
	public function isLogged() {
		return $this->isLogged;
	}
	public function getUserData() {
		return $this->userData;
	}
	public function logout(){ error_log('logout');
		unset($_COOKIE['username']);
		setcookie('username', '', time() - 700000, '/');
		$this->isLogged = false;
		$this->userData = array();
		//$_SESSION["newsession"]=array();
		//session_destroy();
		
		
		
	}
	public function saveImage ($name, $image) {
		$query = "INSERT INTO `images` (`name`, `image`, `username`) values ('$name', '$image', 't.vasileva');";
		$result = $this->query($query); error_log(var_export($query, true));
		if($result) {
			echo 'Image uploaded';
		} else {
			echo 'Image not uploaded';
		}
	}
	public function displayImages() {
		$query = "SELECT * FROM `images`;";
		$result = $this->select($query);
		return $result;
	}
}