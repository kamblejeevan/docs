<?php
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$dob=$_POST['dob'];
$gender=$_POST['gender'];
$address=$_POST['address'];
$adhar=$_POST['adhar'];
$pan=$_POST['pan'];
$contact_no=$_POST['contact_no'];
$email=$_POST['email'];
$connection=mysql_connect('localhost','root','');
$selectdb=mysql_select_db("student",$connection);
if(isset($_POST['Submit']))
{
$sqlquery="INSERT into student1
	values('$fname','$lname','$dob','$gender','$address','$adhar','$pan','$contact_no','$email' )" or die(mysql_error());
$exequery=mysql_query($sqlquery,$connection);

$id1=substr($fname,0,3);
session_start();
$newId=$id1.$id;
$_SESSION['newId']=$newId;
$_SESSION['fname']=$fname;
$sql1="insert into login1 values('$email','$newId')";
mysql_query($sql1);
}






?>
<script>
alert("Registration successfully! and your password is 123456");
document.location="login.php";
</script>
