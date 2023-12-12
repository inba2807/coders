<?php
          session_start();
          $session_id = $_SESSION['userid'];
          if($session_id == null){
	     header("location:index.php");
	     die();
          }
          include 'Connect.php';
          $first_name = $_POST['first_name'];
	  $last_name = $_POST['last_name'];
	  $gender = $_POST['gender'];
	  $contact_no = $_POST['contact_no'];
	  $qualification = $_POST['qualification'];
	  $city = $_POST['city'];
	  $email1 = $_POST['email1'];
	  $email2 = $_POST['email2'];
	  $address = $_POST['address'];
	  $description = $_POST['description'];
	  $dateofbirth = date("Y-m-d",strtotime($_POST['dob']));
	  $flag = "";
	  $query = "update student_information set
   first_name='$first_name',last_name='$last_name',gender='$gender',date_of_
   birth='$dateofbirth',";
	  $query .=
   "qualification='$qualification',contact_no='$contact_no',email1='$email1',email
   2='$email2',city='$city',address='$address',description='$description' ";
        $query .= " where student_id='$student_id'";
        $result = mysql_query($query, $link_id);
	if(mysql_error() != null){
	       die(mysql_error());
	}
	if($result)
	{
	      $flag = "success";
	}
    else
	{
	      $flag = "error";
	}
	header("location:Admin_Edit_Student_Info.php?
    flag=$flag&student_id=$student_id");
    ?>