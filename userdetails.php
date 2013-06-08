<?php
session_start();
if($_SESSION['userid']=='')
{
header("Location:index.php");
}


		if (isset($_POST['logout'])) 
		{
			session_destroy(); 
			header("Location:login.php");
		}
$userid=$_SESSION['userid'];
			mysql_connect("localhost","root","root");
			mysql_select_db("usersdb");
$sql = mysql_query("SELECT * FROM Userregistration where id='$userid'");
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<style>
.nav-header
{
		background:black;
		height:103px;		
}
#footer
{
	height:100px;
	background:black;
}
table
{
	margin-top: 18px;
	border:1px solid #FFFFFF;
	margin-left: auto;
	margin-right: auto;
	width: 546px;
	height: 457px;
}
th
{
	width:250px;
	background:#666666;
	color:#ffffff; 
	font-family:verdana;
 	font-weight:normal;
}
.even
{
	background:#C3C3C3;

}
.odd
{
	background:#e3e3e3;
}
h1
{
	color:white;
}
h2
{
	color: white;
	margin-left:281px;
	margin-top: 20px;
	font-size: 50px;
	font-family: myOwnFont;
}
@font-face
{
	font-family:myOwnFont;
	src :url('css/fonts/alex-brush/AlexBrush-Regular-OTF.otf');

}
#midle
{
	height:800px;
	background:whitesmoke;
}

#profile
{
	width:100px;
	height:100px;


}
.pic
{
	margin-left: 351px;
}
img
{

	height: 185px;
    	width: 200px;

}
span
{
	
	font-size:20px;
	color:#663300;

}
input
{
	margin-top: 27px;
	margin-left: 31px;
}
td
{
	text-align:left;
}
b
{
	margin-left:7px;
}

</style>
</head>
<body>
<form name="frmForm" id="frmForm" method="post" action="" >
<div class="nav-header">
<h1>FUN.COM</h1>
</div>
<div class="row" id="midle">
<input type="submit" class="btn btn-inverse" value=LOGOUT name="logout" />
<?php

while ($row = mysql_fetch_array($sql)) 
{
$username  = $row['UserName'];
$password  = $row['Password'];
$confirmpassword = $row['ConfirmPassword'];
$firstname = $row['FirstName'];
$lastname  = $row['LastName'];
$profilepic = $row['ProfilePic']; 
$gender = $row['Gender']; 
$dateofbirth = $row['DateOfBirth'];
$date=date("jS M Y",strtotime($dateofbirth));
$hobbies = $row['Hobbies']; 
$email   = $row['Email'];

?>
<div id="total">
<div class="pic">
<span>YOUR PROFILEPIC</span>
<b><font color='#663300'><?php  echo '<img src="uploads/'.$profilepic.'" />'; ?></font></b>
</div>
</tr>
<table border="0"  cellspacing="2" cellpadding="5"> 
<tr>
<th>This Are Your Registration Details</th>
<th><a href="edit.php" class="btn btn-inverse">Edit</a></th> 
</tr>
<tr class="odd">
<td>UserName:</td> 
<td><b><font color='#663300'><?php echo $username; ?></font></b></td>
</tr>
<tr class="even">
<td>Password:</td>
<td><b><font color='#663300'><?php echo $password; ?></font></b></td>
</tr>
<tr class="odd">
<td>ConfirmPassword:</td>
<td><b><font color='#663300'><?php echo $confirmpassword ;?></font></b></td>
</tr>
<tr class="even">
<td>FirstName:</td>
<td><b><font color='#663300'><?php echo $firstname;?></font></b></td>
</tr>
<tr class="odd">
<td>LastName:</td>
<td><b><font color='#663300'><?php echo $lastname;?></font></b></td>
</tr>
<tr class="even">
<td>Gender:</td>
<td><b><font color='#663300'><?php echo $gender; ?></font></b></td>
</tr>
<tr class="odd">
<td>Date Of Birth:</td>
<td><b><font color='#663300'><?php echo $date; ?></font></b></td>
</tr>
<tr class="even">
<td>Hobbies:</td>
<td><b><font color='#663300'><?php echo $hobbies ; ?></font></b></td>
</tr>
<tr class="odd">
<td>Email:</td>
<td><b><font color='#663300'><?php echo $email; ?></font></b></td>
</tr> 
<?php 
} 
?>
</table>
</div>
</div>
<div class="footer" id="footer">
</div>
</form>
</body>
</html>
