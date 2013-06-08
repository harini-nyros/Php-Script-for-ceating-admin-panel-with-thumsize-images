<?php
?>
<!DOCTYPE html>
<html>
<head>
<title>Assignment7</title> <!-- Title of the page-->
<!--linking Style Sheets-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/reg.css">
<!-- linking Javascript Files-->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/validations.js"></script>
</head><!--Head Ending-->
<body><!-- body begining-->
<!--Container-->
<!-- Form --> 
<form name="myForm" method="post" action=""  onsubmit="return formValidate(this)" class="form-horizontal" enctype="multipart/form-data" >
<div class="nav-header">
<h1>Fun.com</h1>
  <ul class="nav nav-pills">
	 <li><a href="index.php">Home</a></li>
    	<li><a href="login.php">Login</a></li>
  </ul>
</div>
<div class="row" id="midle">
<div class="container">
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
			$spath = "uploads/";
			if(move_uploaded_file($fileTmpLoc,$spath.$filename1))
			{
				chmod($spath.$filename1, 0777);
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
			$role='user';
			$query = mysql_query("SELECT * FROM Userregistration WHERE UserName = '". $username ."' OR Email = '". $email ."'");
			$row = mysql_fetch_array($query);
			$uname=$row['UserName'];
			$mailid=$row['Email'];
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
  Header("Location: login.php"); 
}
}
?>
<div class="row" id="total">
<div class="row">
<div class="span10">
	<h4><b>Register For Free Account<b></h4>
	<h6>Please check your mail after Registering for confirmation</h6> 
	<hr>
</div>
</div> 
 <!--Username textbox-->
<div class="row main">
<div class="span10">   
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
			<input type="submit"  name="Register" class="btn btn-success" value="Register" />
    		</div>
	</div>

</div>
</div>
</div>
</div><!--Container-->
</div>
<div class="footer" id="footer">
</div>
</form>
</body>
</html>


