<?php
session_start();
if($_SESSION['adminuserid']=='')
{
header("Location:index.php");
}
?>
<?php
mysql_connect("localhost","root","root");
mysql_select_db("usersdb");
$userid=$_SESSION['userid'];
$id=$_GET['id'];
$sql = mysql_query("SELECT * FROM Userregistration where id='$id'");
$row = mysql_fetch_array($sql);
$username  = $row['UserName'];
$password  = $row['Password'];
$confirmpassword = $row['ConfirmPassword'];
$firstname = $row['FirstName'];
$lastname  = $row['LastName'];
$profilepic = $row['ProfilePic'];
$dateofbirth = $row['DateOfBirth'];
$date=date("jS M Y",strtotime($dateofbirth)); 
$gender = $row['Gender'];
$hobbies = $row['Hobbies']; 
$email = $row['Email'];
$message_user = "
User Name :$username
Password  :$password 
Confirm Password :$confirmpassword
First Name :$firstname
Last Name  :$lastname
Profile Pic :$profilepic
Gender :$gender
Date of Birth :$date 
Hobbies :$hobbies 
Email   :$email";
	$subject_user = "We have changed some of your details for security reasons so please check your details";
		$mail_sent = @mail($email, $subject_user, $message_user);
 		header("Location:admnoperations.php");

?>

