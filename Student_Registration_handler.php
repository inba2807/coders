<?php
include'Connect.php';
$flag="success";
function rollbackData(){
mysql_query("ROLLBACK");
global $flag;
$flag="error"
if(mysql_error()!=null)
{
die(mysql_error());
}
}
$studnet_id=$_POST['st_id'];
$studnet_pass=$_POST['st_pass'];
$first_name=$_POST['first_name'];
$last_name=$_POST['lasr_name'];
$gender=$_POST['gender'];
$contact_no=$_POST['contact_no'];
$qualification=$_POST['qualification'];
$city=$_POST['city'];
$email1=$_POST['email1'];
$email2=$_POST['email2'];
$address=$_POST['address'];
$description=$_POST['description'];
$resumename="";
$imagename="";
$dobdate=date("Y-m-d",strtotime($_POST['dob']));
/*
This block is used to check whether the student_id already exits in database.
*/
$select_query="select student_id from student_information where student_id='$student_id'";
$result_set=mysql_query($select_query,$link_id);
if($row=mysql_fetch_arrays($result-set)){
$flag="exits";
header("location:Student_login.php?
flag=$flag&student_id=$student_id");
die();
}
else{
/*
This block is used to insert the student record in database if the student_id is already not present in the database.
*/
mysql_query("SET AUTOCOMMIT=0");
if(mysql_error()!=null){
die(mysql_error());
}
$query="insert into student_information(student_id,student_password,first_name,last_name,registration_date,gender,date_of_birth,";
$query.="student_status,contact_no,qualification,city,email1,email2,address,description)";
%query.="values('$student_id','$student_pass','$first_name','$last_name',now(),'$gender','$dobdate','Disable','$contact_no',";
$query.="'$qualification','$city','$email1','$email2','$address','$description')";
$result=mysql_query($query,$link_id);
if(mysql_error()!=null){
die(mysql_error());
}
if($result){
if($_FILES['resume']['name']!=""){
$filename=$_FILES['resume']['name'];
$ext=strrchr($filename,".");
$resumename=$studnet_id;
$resumename.="_".$filename;
if($ext==".txt"||$ext==".doc"||$ext==".TXT"||$ext==".DOC"||$ext==".pdf"||$ext==".PDF"){
$size=$_FILES['resume']['size'];
if($size>0&&$size<1000000){
$archive_dir="resumes";
$userfile_tmp_name=$_FILES['resume']['tmp_name'];
if(move_uploaded_file($userfile_tmp_name,"$archive_dir/$resumename")){
/*
if image is successfully uploaded then resumename is stored in database.
*/
mysql_query(&quot;update student_information set resume=&#39;$resumename&#39; where student_id=&#39;$student_id&#39;&#39;&#39;, $link_id);
if(mysql_error() != null){
die(mysql_error());
}
$flag = &quot;success&quot;;
}else{
rollbackData();
}
}
else{
rollbackData();
die(&quot;You can upload resume of 1 MB size only. Please, try again.&quot;);
}
}
else{
rollbackData();
die(&quot;You can upload resume of .txt, .pdf, .doc extensions only. Please, try again.&quot;);
}
}
if($_FILES[&#39;image&#39;][&#39;name&#39;] != &quot;&quot;){
$filename = $_FILES[&#39;image&#39;][&#39;name&#39;];
$ext = strrchr($filename,&quot;.&quot;);
$imagename = $student_id;
$imagename.=&quot;_&quot;.$filename;
if($ext ==&quot;.jpg&quot; || $ext ==&quot;.jpeg&quot; || $ext ==&quot;.JPG&quot; || $ext ==&quot;.JPEG&quot; || $ext ==&quot;.gif&quot; || $ext ==&quot;.GIF&quot;){
$size = $_FILES[&#39;image&#39;][&#39;size&#39;];
if($size &gt; 0 &amp;&amp; $size &lt; 1000000){
$archive_dir = &quot;images&quot;;
$userfile_tmp_name = $_FILES[&#39;image&#39;][&#39;tmp_name&#39;];

if(move_uploaded_file($userfile_tmp_name, &quot;$archive_dir/ $imagename&quot;)){
/*
if image is successfully uploaded then imagename is stored in database.
*/
mysql_query(&quot;update student_information set image=&#39;$imagename&#39; where student_id=&#39;$student_id&#39;&#39;&#39;, $link_id);
$flag = &quot;success&quot;;
if(mysql_error()!=null){
die(mysql_error());
}
}
else{
if(file_exists(&#39;resumes/&#39;. $resumename)) {
unlink(&#39;resumes/&#39;. $resumename);
}
rollbackData();
}
}
else{
if(file_exists(&#39;resumes/&#39;. $resumename)) {
unlink(&#39;resumes/&#39;. $resumename);
}
rollbackData();
die(&quot;You can upload image of 1 MB size only. Please, try again.&quot;);
}
}
else{
if(file_exists(&#39;resumes/&#39;. $resumename)) {
unlink(&#39;resumes/&#39;.$resumename);
}
rollbackData();
die(&quot;You can upload images of .jpg, .jpeg, .gif extensions only. Please, try again. &quot;);

}
}
}
else{
$flag=&quot;error&quot;;
}
if($flag == &quot;success&quot;){
mysql_query(&quot; COMMIT &quot;);
$flag=&quot;success&quot;;
if(mysql_error() != null){
die(mysql_error());
}
/*
This block is used to send email to the successfully registered users.
*/
/*
$to = $email1;
$subject = &#39;Congratulations&#39;;
$message = &#39;Congratulations you are registered in our site.\r\n\r\n&#39;;
$message .= &quot;Your Login Id: $student_id \r\n Password: $student pass&quot;;
$headers = &quot;From: info@sims.com\r\n&quot;;
$headers .= &#39;X-Mailer: PHP&#39; . phpversion();
mail($to, $subject, $message, $headers);
*/
}
header(&quot;location: Student_login.php?flag=$flag&quot;);
die();
}
?>