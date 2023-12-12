<?php

session_start();

$session_id = $_SESSION['userid'];

if($session_id == null){

header("location:index.php");

die();

}

 

include 'Connect.php';

$student_id = $_REQUEST['student_id'];

$query = "select * from student_information where student_id='$student_id''';

$result = mysql_query($query, $link_id);

$data = mysql_fetch_array($result);

?>9


<html>

<head>

<link rel="stylesheet" href="Style.css" type="text/css"/>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<title>Edit Student Information By Admin</title>

<script src="Validation.js"></script>

<script type="text/javascript"> function validation()

{

if(document.form1.first_name.value=="")

{

alert("Please enter your first name.");

document.form1.first_name.focus();

return false;

}

if(document.form1.last_name.value=="")

{

alert("Please enter your last name.");

document.form1.last_name.focus();

return false;

}

if(document.form1.dob.value=="")

{

alert("Please enter your date of birth.");

document.form1.dob.focus();

return false;

}

else

{

var date = document.form1.dob.value;

var yes = checkDate(date);

if(!yes)

{

alert("Please Enter a valid date of birth.");

document.form1.dob.focus();

return false;

}

}

if(document.form1.email1.value=="")

{

alert("Please enter your primary email.");

document.form1.email1.focus();

return false;

}

else

{

var isEmail = emailValidator(document.form1.email1.value);

if(!isEmail)

{

alert("Please enter a valid primary email.");

document.form1.email1.focus();

return false;

}

}

if(document.form1.email2.value != "")

{

var isEmail = emailValidator(document.form1.email2.value);

if(!isEmail)

{

alert("Please enter a valid secondary email.");

document.form1.email2.focus();

return false;

}

}

if(document.form1.address.value != "" && document.form1.address.value.length > 100){

alert("You can enter address upto 100 characters only.")

document.form1.address.focus();

return false;

}

if(document.form1.description.value != "" && document.form1.description.value.length > 200){

alert("You can enter description upto 200 characters only.")

document.form1.description.focus();

return false;

}

}

function SetAll()

{

document.form1.qualification.value="<?php echo $data['qualification'];?>";

var gen = "<?php echo $data['gender'];?>";

var gend = document.form1.gender.length;

for(var i=0; i<gend; i++)

{

if(document.form1.gender[i].value == gen)

document.form1.gender[i].checked=true;

}

}

</script>

</head>

<body onLoad="javascript:SetAll()">

<form name="form1" method="post"

action="Admin_Edit_Student_Info_Handler.php" onSubmit="return validation()">

<input type="hidden" name="student_id" value="<?php echo $student_id; ? >;">

<table width="100%" height="100%">

<tr bgcolor="#E1E1E1">

<td width="100%" height="15%" align="center"><?php include 'Admin_Header.php';?></td>

</tr>

<tr>

<td width="100%" height="80%" align="center"><table width="80%" border="1" cellpadding="2" cellspacing="0" bordercolor="#EEEEEE">

<tr>

 

<td colspan="4" align="center" bgcolor="#EEEEEE" class="stylebig">Edit Student Information</td>

</tr>

<tr>

<td colspan="4" align="center">&nbsp;

<?php if($_GET['flag'] == "success") { ?>

<span class="stylered">Student Information updated successfully.</span>

<?php } else if($_GET['flag'] == "error") { ?>

<span class="stylered">Error while updating student information. Please, try again</span>

<?php } ?>                    </td>

</tr>

<tr class="stylesmall">

<td width="19%" align="left">First Name: </td>

<td width="30%" align="left"><input name="first_name" type="text" id="first_name" value="<?php echo $data['first_name']; ?>" size="25"maxlength="50"></td>

<td width="17%" align="left">Last name</td>

<td width="34%" align="left"><input name="last_name" type="text" id="last_name" value="<?php echo $data[last_name'];?>" size="25" maxlength="30"></td>

</tr>

<tr class="stylesmall">

<td height="29" align="left">Gender: </td>

<td align="left"><input name="gender" type="radio" value="Male">

Male<input name="gender" type="radio" value="Female">

Female</td>

<td align="left">Date Of Birth</td>

<td align="left"><input name="dob" type="text" id="dob" size="10" maxlength="10" value="<?php echo date("d-m- Y", strtotime($data['date_of_birth']));?>">

DD-MM-YYYY</td>

</tr>

<tr class="stylesmall">
 <td align="left">Qualification : </td>
 <td align="left"><select name="qualification" id="qualification">
 <option value="High School">High School</option>
	      <option value="Graduate">Graduate</option>
	      <option value="MCA">MCA</option>
	      <option value="BCA">BCA</option>
	      <option value="Master Degree">Master Degree</option>
	</select></td>
 <td align="left">Contact No</td>
 <td align="left"><input name="contact_no" type="text" id="contact_no"
value="<?php echo $data[$contact_no];?>" size="25" maxlength="20"></td>
    </tr>
    <tr class="stylesmall">
    <td align="left">Primary Email : </td>
    <td align="left"><input name="email1" type="text" id="email1"
value="<?php echo $data['email1'];?>" size="25" maxlength="100"></td>
     <td align="left">Secondary Email</td>
     <td align="left"><input name="email2" type="text" id="email2"
value="<?php echo $data['email2'];?>" size="25" maxlength="100"></td>
    </tr>
    <tr class="stylesmall">
    <td align="left">City : </td>
    <td colspan="3" align="left"><input name="city" type="text" id="city"
value="<?php echo $data['city'];?>" size="25" maxlength="30"></td>
     </tr>
    <tr class="stylesmall">
     <td align="left">Address : </td>
     <td colspan="3" align="left"><textarea name="address" rows="2"
     cols="40"><?php echo $data['address'];?></textarea></td>
         </tr>
		<tr class="stylesmall">
	  <td align="left">Description : </td>
	  <td colspan="3" align="left"><textarea name="description" rows="3"
     cols="40"><?php echo $data['description'];?></textarea></td>
	  </tr>
	  <tr>
	    <td colspan="4">&nbsp;</td>
	  </tr>
	  <tr>
	    <td colspan="4" align="center"><input name="update" type="submit"
     id="update" value="Update">
	   <input name="close" type="button" id="close" value="Close"
     onClick="self.location='DisplayAll.php'"></td>
	   </tr>
	</table></td>
       </tr>
     <tr bgcolor="#E1E1E1">
      <td width="100%" height="5%" align="center"><?php include
    'Footer.php';?></td>
       </tr>
      </table>
     </form>
     </body>
     </html>