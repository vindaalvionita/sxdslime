<?php 
class database{
	var $host = "fdb28.awardspace.net";
	var $username = "3690530_sxdslime";
	var $password = "Bismillah123";
	var $database = "3690530_sxdslime";
	var $koneksi;

	function __construct(){
		$this->koneksi = mysqli_connect($this->host, $this->username, $this->password,$this->database);
	}


	function register($username,$password,$name)
	{	
		$insert = mysqli_query($this->koneksi,"insert into user values ('','$username','$password','$name')");
		return $insert;
	}

	function login($username,$password,$remember)
	{
		$query = mysqli_query($this->koneksi,"select * from user where username='$username'");
		$data_user = $query->fetch_array();
		if(password_verify($password,$data_user['password']))
		{
			
			if($remember)
			{
				setcookie('username', $username, time() + (60 * 60 * 24 * 5), '/');
				setcookie('name', $data_user['name'], time() + (60 * 60 * 24 * 5), '/');
			}
			$_SESSION['username'] = $username;
			$_SESSION['name'] = $data_user['name'];
			$_SESSION['is_login'] = TRUE;
			return TRUE;
		}
	}

	function relogin($username)
	{
		$query = mysqli_query($this->koneksi,"select * from user where username='$username'");
		$data_user = $query->fetch_array();
		$_SESSION['username'] = $username;
		$_SESSION['name'] = $data_user['name'];
		$_SESSION['is_login'] = TRUE;
	}
} 


?>