<html>
<head>
<link rel="stylesheet" href="Style.css" type="text/css"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Student Registration Page</title>
<script src="Validation.js"></script>
<script type="text/javascript">
function validation()
{
	if(document.form1.first_name.value=="")
	{
	  alert("Please enter your first name. ");
	  document.form1.first_name.focus();
	  return false;
	}
	if(document.form1.last_name.value=="")
	{
	  alert("Please enter your first name. ");
	  document.form1.last_name.focus();
	  return false;
	}
	if(document.form1.dob.value=="")
	{
	  alert("Please enter your date of birth. ");
	  document.form1.dob.focus();
	  return false;
	}
	else
	{
	  var date=document.form1.dob.value;
	  var yes=checkDate(date);
	  if(!yes)
	 	{
		   alert("Please enter a valid date of birth. ");
	  	   document.form1.dob.focus();
	           return false;
		}
	}
	if(document.form1.email1.value=="")
	{
	  alert("Please enter your primary email. ");
	  document.form1.email1.focus();
	  return false;
	}
	else
	{
	  var isEmail=emailValidator(document.form1.email1.value);
	  if(!isEmail)
	  {
		alert("Please enter a valid primary email. ");
	        document.form1.email1.focus();
	        return false;
	  }
	}
	if(document.form1.address.value!=""&&
	document.form1.address.value.length>100){
		alert("You can enter address upto 100 characters only.");
document.form1.address.focus();
return false;
}
if(document.form1.description.value!=""&& document.form1.description.value.length>200){
alert("You can enter description upto 200 characters only.");
document.form1.description.focus();
return false;
}
if(document.form1.st_id.value=="")
{
alert("Please enter your desired student id.");
document.form1.st_id.focus();
return false;
}
if(document.form1.st_pass.value=="")
{
alert("Please enter your desired password.");
document.form1.st_pass.focus();
return false;
}
if(document.form1.retype.value=="")
{
alert("Please enter retype password.");
document.form1.retype.focus();
return false;
}
if(document.form1.st_pass.value!=document.form1.retype.value)
{
alert("Password and retype password are not same.");
document.form1.st_pass.value="";
document.form1.retype.value="";
document.form1.st_pass.focus();
return false;
}
}
</script>
</head>
<body onLoad="javascript:document.form1.first_name.focus()">
<form name="form1"method="post"
action="Student_Registration_handler.php"onSubmit="return validation()"
enctype="multipart/form-data">
<table width="100%">
<tr>
<tr width="100%"height="15%"align="center"><?php include'Header.php';?></td>
</tr>
<tr>
<td width="100%"height="80%"align="center"><table width="80%"border="1"cellpadding="2"cellspacing="0"bordercolor="#CCCCCC">
<tr bgcolor="#EEEEEE">
<td colspan="4'align="center"class="stylemedium">Student Information</td>
</tr>
<tr class="stylesmall">
<td>First name<span class="stylered">*</span></td>
<td><input name="first_name"type="text"id="first_name"
maxlength="50">
</td>
<td>Last Name<span class="stylered">*</span></td>
<td><input name="last_name"type="text"id="last_name"
maxlength="30">
</td>
</tr>
<tr class="stylesmall">
<td>Gender</td>
<td><input name="gender"type="radio"value="Male"checked>
Male<input name="gender"type="radio"value="Female">
Female</td>
<td>Date of Birth<span class="stylered">*</span></td>
<td><input name="dob"type="text"id="bob"size="10'maxlength="10">
DD-MM-YYYY</td>
</tr>
<tr class="stylesmall">
<td>Qualification<span class="stylered">*</span></td>
<td><select name="qualification"id="qualification">
<option value="">-----select-----</option>
<option value="High School">High school</option>
<option value="Graduate">Graduate</option>
<option value="MCA">MCA</option>
<option value="BCA">BCA</option>
<option value="Master Degree">Master Degree</option>
</select></td>
<td>Contact No</td>
<td><input name="contact_no"type="text"id="contact_no"
maxlength="20"</td>
</tr>
<tr class="stylesmall">
<td>City</td>
<td><input name="city"type="text"id="city"maxlength="30"></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr class="stylesmall">
<td>Primary Email<span class="stylered">*</span></td>
<td><input name="email1"type="text"id="email1"
maxlength="100"></td>
<td>Secondary Email</td>
<td><input name="email2"type="text"id="email2"
maxlength="100"></td>
</tr>
<tr class="stylesmall">
<td>Address</td>
<td colspan="3"><textarea name="address"cols="45"rows"2"
id="address"></textarea></td>
</tr>
<tr class="stylesmall">
<td>Description</td>
<td colspan="3"><textarea name="description"cols="45"rows="3"
id="description"></textarea></td>
</tr>
<tr bgcolor="#EEEEEE">
<td colspan="4"align="center"class="stylemedium">Login
Information</td>
</tr>
<tr>
<td colspan="4">&nbsp;</td>
</tr>
<tr class="stylesmall">
<td>Desired ID<span class="stylered">*</span></td>
<td><input name="st_id"type="text"id="st_id"maxlength="20"></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr class="stylesmall">
<td>Password<span class="stylered">*</span></td>
<td><input name="st_pass"type="password"id="st_pass"maxlength="20"></td>
<td align="right">Retype Password<span class="stylered">*</span>
</td>
<td><input name="retype"type="password"id="retype"maxlength="20"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr bgcolor="#EEEEEE">
<td colspan="4"align="center"class="stylemedium">Resume
Information</td>
</tr>
<tr class="stylesmall">
<td>Upload Resume</td>
<td colspan="3"><input name="resume"type="file">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="stylered">.doc,.txt,.pdf file only</span></td>
</tr>
<tr>
<td colspan="4">&nbsp;</td>
</tr>
<tr align="center"class="stylemedium"bgcolor="#EEEEEE">
<td colspan="4">Image Information</td>
</tr>
<tr class="stylesmall">
<td>Upload Image</td>
<td colspan="3"><input type="file"name="image">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="stylered"><span class="stylered">.jpg file And .gif file only</span></td>
</tr>
<tr>
<td colspan="4"><span class="stylered">*<em>means fields are compulsory</em></span></td>
</tr>
<tr>
<td colspan="4" align="center"><input name="register"type="submit"id="register"value="Register">
<input name="reset"type="reset"id="reset"value="Reset">
<input name="close"type="close"id="close"value="Close"
onClick="self.location='Student_login.php'"></td>
</tr>
</table></td>
</tr>
<tr>
<td width="100%"height="5%"align="center"><?php include'Footer.php';?></td>
</tr>
</table>
</form>
</body>
</html>
