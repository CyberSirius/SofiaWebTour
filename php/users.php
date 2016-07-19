<?php
class Users extends Db{
	public  $isLogged = false;
	public  $userData = array();
	
	public function login($username, $password) {
		//session_start();
		
		$status = false;
		$query = "SELECT * FROM `users` WHERE `username`='".$username."'";
		$result = $this->select($query); 
		if(!empty($result)) {
			$userData = $result[0]; error_log(var_export($userData, true));
		} else {
			//break;
		} 
		
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
	public function logout(){
		unset($_COOKIE['username']);
		setcookie('username', '', time() - 700000, '/');
		$this->isLogged = false;
		$this->userData = array();
	}
	public function saveImage ($name, $image, $category) {	
		$query = "INSERT INTO `images` (`name`, `image`, `category`) values ('$name', '$image','$category');";
		$result = $this->query($query);
	}
	public function displayImagesByCategory($category) {
		$query = "SELECT * FROM `images` where `category` = $category;";
		$result = $this->select($query);
		return $result;
	}
	public function getUserName() {
		return $this->userData['username'];
	}
}