<?php
session_start();
if($_SESSION['adminuserid']=='')
{
header("Location:../index.php");
}
$id=$_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Add User page</title>  <!-- Title of the page-->
<!--linking Style Sheets-->
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<!--<link rel="stylesheet" type="text/css" href="css/index.css">-->
<link rel="stylesheet" type="text/css" href="../css/reg.css">
<!-- linking Javascript Files-->
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/validations.js"></script>
<style>

#midle
{
	height:650px;
	background:whitesmoke;
}
</style>
</head><!--Head Ending-->
<body><!-- body begining-->
<!--Container-->
<!-- Form --> 
<form name="myForm" method="post" action=""  onsubmit="return formValidate(this)" class="form-horizontal" enctype="multipart/form-data" >
<?php include 'header.php';?>
<?php
$all=array("painting","Singing","Travelling","Others");
		if (isset($_POST['Register'])) 
		{
			
			
			mysql_connect("localhost","root","root");
			mysql_select_db("usersdb");
			$username=$_POST['username'];
			$password=$_POST['password'];
			$confirmpassword=$_POST['confirmpassword'];
			$firstname=$_POST['firstname'];
			$lastname=$_POST['lastname'];
			$filename=$_POST['filename'];
			$filename1= $_FILES['filename']['name'];
			$fileTmpLoc = $_FILES['filename']['tmp_name'];					
			$type = $_FILES['filename']['type'];
			$png_compression=6;
			$jpeg_quality=75;
			$kaboom = explode(".", $fileName1);
			$fileExt = end($kaboom);
			$normalDestination = "uploads/".$filename1;
			$httpRootLarge ="uploads/Thumbsizes/".$filename1;
			if(move_uploaded_file($fileTmpLoc,$normalDestination))
			{
				//chmod($spath.$filename1, 0777);
				chmod($normalDestination, 0777);
				createThumb($normalDestination,$httpRootLarge,50,50);
			}
			$male_status = 'unchecked';
			$female_status = 'unchecked';
			$sex=$_POST['sex'];
			if($sex == 'Male')
			 {
				$male_status = 'checked';

			 }
			else if($sex == 'female') 
			{
				$female_status = 'checked';
			}
			$birthdaydate =$_POST['year']."-".$_POST['month']."-".$_POST['day'];
			$hobbies = implode(",",$_POST['hobbies']);
			$hb=$_POST['hobbies'];
			$status="unchecked";
			$email=$_POST['email'];
			$query = mysql_query("SELECT * FROM Userregistration WHERE UserName = '". $username ."' OR Email = '". $email ."'");
			$row = mysql_fetch_array($query);
			$uname=$row['UserName'];
			$mailid=$row['Email'];
			$role='user';
			if($uname == $username )
			{
			echo "<div style='color: red;margin: 0 auto;float: left;margin-left: 304px;'>Username already exists please change the username</div>";
?>
<?php
			
			}

			else if($email== $mailid)
			{
				echo "<div style='color: red;margin: 0 auto;float: left;margin-left: 304px;'>Email already exists please change the email</div>";?>
<?php				
			}
			else
			{
			
			$result=MYSQL_QUERY("INSERT INTO Userregistration(UserName,Password,ConfirmPassword,FirstName,LastName,ProfilePic,Gender,DateOfBirth,Hobbies,Email,role)".
"VALUES ('$username', '$password', '$confirmpassword', '$firstname', '$lastname','$filename1','$sex','$birthdaydate','$hobbies','$email','$role')");
	//mail($to_user, $subject_user, $message_user, $headers_user);
	//$subject_user = "You have successfully registered!";
	//$message_user = "Thank you For registering.";
	//$mail_sent=mail($email, $subject_user, $message_user, $headers_user);
  Header("Location: admnoperations.php"); 

}
}
function createThumb($upfile, $dstfile, $max_width, $max_height)
{
   $size = getimagesize($upfile);
   $width = $size[0];
   $height = $size[1];
   $x_ratio = $max_width / $width;
   $y_ratio = $max_height / $height;
   if(($width <= $max_width) && ($height <= $max_height)) 
   {
           $tn_width = $width;
           $tn_height = $height;

   } elseif (($x_ratio * $height) < $max_height) {

           $tn_height = ceil($x_ratio * $height);

           $tn_width = $max_width;

   } else {

           $tn_width = ceil($y_ratio * $width);

           $tn_height = $max_height;

   }
   if($size['mime'] == "image/jpeg"){

           $src = ImageCreateFromJpeg($upfile);

           $dst = ImageCreateTrueColor($tn_width, $tn_height);

           imagecopyresampled($dst, $src, 0, 0, 0, 0, $tn_width, $tn_height,$width, $height);

           imageinterlace( $dst, true);

           ImageJpeg($dst, $dstfile, 100);

   } else if ($size['mime'] == "image/png"){

           $src = ImageCreateFrompng($upfile);

           $dst = ImageCreateTrueColor($tn_width, $tn_height);

           imagecopyresampled($dst, $src, 0, 0, 0, 0, $tn_width, $tn_height,$width, $height);

           Imagepng($dst, $dstfile);

   } else {

           $src = ImageCreateFromGif($upfile);

           $dst = ImageCreateTrueColor($tn_width, $tn_height);

           imagecopyresampled($dst, $src, 0, 0, 0, 0, $tn_width, $tn_height,$width, $height);

           imagegif($dst, $dstfile);

   }

}


?>
<div class="row" id="midle">
<div class="container">
<div class="row" id="total">
<div class="row">
<div class="span9">
	<h4><b>Fill the details to successfully add new user account</b></h4>
	<hr>
</div>
</div> 
 <!--Username textbox-->
<div class="row main">
<div class="span9">   
	<div class="control-group">
    <label class="label">User Name:</label>
    <div class="controls">
      <input type="text" name="username" id="username" placeholder="Username"  value="<?php if($uname== $username) echo ''; else echo $username;?>"/>
    </div>
</div>
<!-- Password textbox-->
<div class="control-group" >
    <label class="control-label">Password:</label>
    <div class="controls">
      <input type="password"  name="password" id="password" placeholder="Password" value="<?php print $password?>" />
    </div>
</div>
<!--Confirm Password textbox-->
<div class="control-group">
    <label class="control-label">Confirm Password:</label>
    <div class="controls">
      <input type="password"  name="confirmpassword" id="comfirmpassword" placeholder="Password" value="<?php print $confirmpassword;?>"/>
    </div>
</div>
 <!--Firstname textbox-->
<div class="control-group" >
    <label class="control-label">First Name:</label>
    <div class="controls">
      <input type="text" name="firstname" id="firstname" placeholder="Firstname" value="<?php print $firstname ; ?>"/>
    </div>
</div>
<!--Lastname textbox-->
<div class="control-group">
    <label class="control-label" for="lastname">Last Name:</label>
    <div class="controls">
      <input type="text"  name="lastname" id="lastname" placeholder="Lastname" value="<?php print $lastname;?>"/>
    </div>
</div>
<!--profilepic-->
<div class="control-group">
    <label class="label" for="pic">Profile Pic :</label>
    <div class="controls">
      <input type="file" name="filename" id="filename" value="<?php print $filename1;?>"/>
    </div>
</div>
<!--Radio buttons-->
<div class="control-group">
    <label class="label" for="gen">Gender:</label>

    <div class="controls">
      	<label class="radio  inline">
  		<input type="radio" name="sex" id="male" value="Male" <?php print $male_status; ?> />Male
	</label>
	
	<label class="radio  inline">
		  <input type="radio" name="sex" id="female" value="female" <?php print $female_status; ?> />Female
	</label>
    </div>
</div>
<!--Select boxes-->
<div class="control-group">
    <label class="control-label" for="dob">Date of Birth :</label>
    <div class="controls">
<!--<select id="fullviewbday" name="fullviewbday" style="width:140px;" onchange="return setfullviewbday(this.value);"></select>-->
     <select  name="day" id="day" class="input shadow_select">
<option value="default">Select Day</option>
<?php	
	for($i=1;$i<=31;$i++)
	{
		if($i<=9)
		{
			if($_POST["day"] == $i)
				{
?>
<option value ="<?php print $_POST['day'] ?>" selected="selected"><?php print $_POST['day']  ;?></option>
			<?php		
				}
			else
				{
			?>
				<option value="<?php print '0'.$i; ?>"><?php print '0'.$i ;?></option>
			<?php
				} 
		}
			else
			{

			if($_POST["day"] == $i)
			{
?>
<option value ="<?php print $_POST['day'] ?>" selected="selected"><?php print $_POST['day']  ;?></option>
			<?php		
			}
			else
			{
			?>
				<option value="<?php print $i; ?>"><?php print $i ;?></option>
			<?php
			}
		}
		
		
	}
?>
</select>
<select  name="month" id="month" class="input shadow_select">
<?php
$months=array("Select Month","January","February","March","April","May","June","July","August","september","october","November","December");
foreach($months as $key=>$value)
{

	if((isset($_POST["month"]))
&&($_POST["month"] == $key))
	{
?>
<option value ="<?php print $key?>" selected="selected"><?php print $value ;?></option>			
<?php		
	}
	else
	{
?>
<option value="<?php print $key; ?>"><?php print $value ;?></option>
<?php
	}
}
?>
</select>
<select name="year" id="year" class="input shadow_select">
<option  value="default">Select Year</option> 
<?php
	
	for($y=2013;$y>=1970;$y--)
	{
		if($_POST["year"] == $y)
		{
?>
<option value ="<?php print $_POST['year'] ?>" selected="selected"><?php print $_POST['year']  ;?></option>
<?php		}
else
{
?>
<option value ="<?php print $y; ?>"><?php print $y ;?></option>
<?php
	}
}

?>

</select>
    </div>
</div>
<!--Checkboxes-->
<div class="control-group ">
    <label class="control-label">Hobbies :</label>
    <div class="controls">
<?php
foreach($all as $value)
			{
$i=1;
				
				if(in_array($value,$_POST['hobbies']))
				{
?>
				<label class="checkbox inline">
  		<input  type="checkbox" checked name="hobbies[]" value="<?php echo $value;?>" ><?php echo $value;?>
	</label>
			<?php		

				}
				else
				{
					?>
<label class="checkbox inline">
  		<input  type="checkbox" name="hobbies[]" value="<?php echo $value;?>" ><?php echo $value;?>
	</label>
<?php

				}
//$i++;
			}
?>
   </div>
</div>       
<!--Email field-->	
	<div class="control-group">
    		<label class="control-label">Email:</label>
    		<div class="controls">
	<input type="text"  name="email" placeholder="Email" value="<?php if($email== $mailid) echo ''; else echo $email;?>"/>
		</div>
	</div>

	<div class="control-group" style="padding-left:50px">
    		<div class="controls">
			<input type="submit"  name="Register" class="btn btn-success" value="Submit" />
    		</div>
	</div>

</div>
</div>
</div>
</div><!--Container-->
</div>
</form>
<?php include 'footer.php';?>
</body>
</html>


