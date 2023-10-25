<?php 
session_start();
 
$testconfig = mysqli_connect('localhost', 'root', '', 'ez_recycling');
 
$username = $_POST['username'];
$password = $_POST['password'];
 
 
$login = mysqli_query($testconfig,"select * from accounts where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);

if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	if($data['Role']=="Environmentalist"){
 
		$_SESSION['username'] = $username;
		$_SESSION['Role'] = "environmentalist";
		header("location:Environmentalist/Dashboard.php");
 
	}else if($data['Role']=="Member"){
		$_SESSION['username'] = $username;
		$_SESSION['Role'] = "member";
		header("location:Member/Dashboard-Member.php");
 
	}else if($data['Role']=="Event Manager"){
		$_SESSION['username'] = $username;
		$_SESSION['Role'] = "eventmanager";
		header("location:EventManager/Dashboard.php");

	}else{
 
		header("location:login.php?pesan=gagal");
	}	
}else{
	header("location:login.php?pesan=gagal");
}