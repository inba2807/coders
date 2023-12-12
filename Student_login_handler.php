<?php
	session_start();
	include'Connect.php';
	$flag="";
	$student_id=$_POST['st_id'];
	$st_pass=$_POST['st_pass'];
	$query="select last_login_date from student_information where student_id='$student_id' and student_password='$st_pass' and student_status="Enable";
	$result=mysql_query($query,$link_id);
	if(mysql_error()!=null){
		die(mysql_error());
	}
	if($date=mysql_fetch_array($result))
	{
		$lastdate=$date['last_login_date'];
		$date2=date("d-m-Y h:i A",strtotime($lastdate));
		$_SESSION['userid']=$_POST['st_id'];
		$_SESSION['lastlogin']=$date2;
		$_SESSION['type']="Student";
		mysql_query("update student_information set last_login_date=now() where student_id='$student_id',$link_id);
		if(mysql_error()!=null){
		die(mysql_error());
		}
		header("location:Student_Home.php");
		die();
	}
	else
	{
		$flag="invalid";
		header("location:Student_login,php?flag=$flag");
		die();
	}
?>
