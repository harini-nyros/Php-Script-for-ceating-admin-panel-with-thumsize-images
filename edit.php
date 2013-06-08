<?php
session_start();
if($_SESSION['userid']=='')
{
header("Location:index.php");
}
mysql_connect("localhost","root","root");
mysql_select_db("usersdb");
$userid=$_SESSION['userid'];

?>
<!DOCTYPE html>
<html>
<head>
<title>Assignment7</title> <!-- Title of the page-->
<!--linking Style Sheets-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/editval.js"></script>
<style>
.nav-header
{
		background:black;
		height:103px;		
}
.pic
{
	margin-left: 45px;

}
#midle
{
	height:950px;
	background:Whitesmoke;
}

#total
{
	margin-left:200px;
	border: 1px solid #EBEBEB;
	background: #EBEBEB;
	border-radius: 32px;
}
.container
{
	
margin-top: 32px;

}
select
{
	width:130px;
}
h4
{
	margin-left: 275px;

}
#footer
{
	height:100px;
	background:black;
}
h1
{
	color:white;
}
</style>
</head><!--Head Ending-->
<body><!-- body begining-->
<!--Container-->
<!-- Form --> 
<?php
$sql = mysql_query("SELECT * FROM Userregistration where id='$userid'");
while ($row = mysql_fetch_array($sql)) 
{
$username  = $row['UserName'];
$password  = $row['Password'];
$confirmpassword = $row['ConfirmPassword'];
$firstname = $row['FirstName'];
$lastname  = $row['LastName'];
$profilepic = $row['ProfilePic']; 
$gender = $row['Gender']; 
if($gender == 'Male')
{
	$male_status = 'checked';

}
else if($gender == 'female') 
{
	$female_status = 'checked';
}
$dateofbirth = $row['DateOfBirth']; 
$date=date('d-m-Y',strtotime($dateofbirth));
$arr =explode("-",$date);
$day=$arr[0];
$month=$arr[1];
$year=$arr[2];
$hobbies =explode(",",$row['Hobbies']);
$count=count($hobbies);
for($c=0;$c<$count;$c++)
{
 if($hobbies[$c]=='painting') 
{
    $hb1='checked=true';
} else if($hobbies[$c]=='Singing') 
{
    $hb2='checked=true';
} else if($hobbies[$c]=='Travelling') 
{
    $hb3='checked=true';
} else if($hobbies[$c]=='Others') 
{
    $hb4='checked=true';
}
}
$email   = $row['Email'];

}

?>
 <form name="myForm" method="post" action=""  class="form-horizontal" enctype="multipart/form-data" onsubmit="return formValidate(this)">
<?php if (isset($_POST['Register'])) 
		{
			$uname=$_POST['username'];
			$pwd=$_POST['password'];
			$cnfrmpwd=$_POST['confirmpassword'];
			$fname=$_POST['firstname'];
			$lname=$_POST['lastname'];
			$file= $_FILES['filename']['name'];
			$fileTmpLoc = $_FILES['filename']['tmp_name'];					
			$type = $_FILES['filename']['type'];
			$spath = "uploads/";
			if(move_uploaded_file($fileTmpLoc,$spath.$file))
			{
				chmod($spath.$file, 0777);
			}
			$sex=$_POST['sex'];
			$birthdaydate =$_POST['year']."-".$_POST['month']."-".$_POST['day'];
			$old= $_POST['filename'];
			if($file == '')
			{
				$new=$old;
			}
			else
			{
				$new=$file;
				
			}
			$hobbies = implode(",",$_POST['hobbies']);
			$email=$_POST['email'];			
			$sql1="UPDATE Userregistration SET UserName='$uname',Password='$pwd',ConfirmPassword='$cnfrmpwd',FirstName='$fname',LastName='$lname',
ProfilePic='$new',Gender='$sex',DateOfBirth='$birthdaydate',Hobbies='$hobbies',Email='$email'  WHERE id='$userid'";
$result=mysql_query($sql1);		
			if($result)
			{
                            header("Location:userdetails.php");

			}
		}
?>
<div class="nav-header">
<h1>FUN.COM</h1>
  <ul class="nav nav-pills">
	 <li><a href="userdetails.php">Back To Userdetails</a></li>
  </ul>
</div>
<div class="row" id="midle">
<div class="container">
<div class="row" >
<div class="span9" id="total">
<div class="row">
<div class="span9">
	<h4>Edit user details</h4> 
	<hr>
</div>
</div> 
<div class="pic">
<span>YOUR PROFILEPIC</span>
<input type="hidden" name="filename" value="<?php echo $profilepic ?>"/>
<b><font color='#663300'><?php  echo '<img src="uploads/'.$profilepic.'" />'; ?></font></b>
</div>
<div class="control-group">
    <label class="label" for="pic">Upload new Pic :</label>
    <div class="controls">
      <input type="file" name="filename" id="filename" value="<?php print $filenames;?>"/>
    </div>
</div>
 <!--Username textbox-->
<div class="row main">
<div class="span8">   
	<div class="control-group">
    <label class="label">User Name:</label>
    <div class="controls">
      <input type="text" name="username" id="username" value="<?php echo $username;?>" onclick="userfunction()"/>
    </div>
</div>
<!-- Password textbox-->
<div class="control-group" >
    <label class="control-label">Password:</label>
    <div class="controls">
      <input type="password"  name="password" id="password"  value="<?php print $password?>" />
    </div>
</div>
<!--Confirm Password textbox-->
<div class="control-group">
    <label class="control-label">Confirm Password:</label>
    <div class="controls">
      <input type="password"  name="confirmpassword" id="comfirmpassword" placeholder="Password" value="<?php print $confirmpassword;?>" />
    </div>
</div>
 <!--Firstname textbox-->
<div class="control-group" >
    <label class="control-label">First Name:</label>
    <div class="controls">
      <input type="text" name="firstname" id="firstname" placeholder="Firstname" value="<?php print $firstname ; ?>" />
    </div>
</div>
<!--Lastname textbox-->
<div class="control-group">
    <label class="control-label" for="lastname">Last Name:</label>
    <div class="controls">
      <input type="text"  name="lastname" id="lastname" placeholder="Lastname" value="<?php print $lastname;?>"
/>
    </div>
</div>
<!--profilepic-->

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
     <select  name="day" id="day" class="input shadow_select">
<option value="default">Select Day</option>
<?php	
	for($i=1;$i<=31;$i++)
	{
		if($i<=9)
		{
			if($day == $i)
				{
?>
<option value ="<?php print $day ?>" selected="selected"><?php print $day ;?></option>
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

			if($day == $i)
			{
?>
<option value ="<?php print $day ?>" selected="selected"><?php print $day  ;?></option>
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
	if($month == $key)
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
		if($year == $y)
		{
?>
<option value ="<?php print $year ?>" selected="selected"><?php print $year ;?></option>
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
      	<label class="checkbox inline">
  		<input id="painting" type="checkbox" name="hobbies[]" value="painting" <?php echo $hb1;?>>Painting
	</label>
	
	<label class="checkbox inline">
		  <input id="Singing" type="checkbox" name="hobbies[]" value="Singing" <?php  echo $hb2; ?>>Singing
	</label>

      	<label class="checkbox inline">
  		<input id="Travelling" type="checkbox" name="hobbies[]" value="Travelling" <?php  echo $hb3;  ?>>Travelling
	</label>	
	<label class="checkbox inline">
		  <input id="Others" type="checkbox" name="hobbies[]" value="Others" <?php   echo $hb4; ?>>Others
	</label>
    </div>
</div>         
<!--Email field-->	
	<div class="control-group">
    		<label class="control-label">Email:</label>
    		<div class="controls">
	<input type="text" id="email" name="email" placeholder="Email" value="<?php  echo $email;?>"/>
		</div>
	</div>

	<div class="control-group" style="padding-left:50px">
    		<div class="controls">
			<input type="submit"  name="Register" class="btn btn-danger" value="Submit" />
    		</div>
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

