<?php
session_start();
mysql_connect("localhost","root","root");
mysql_select_db("usersdb");
?>
<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<style>
.nav-header
{
		background:black;
		height:103px;		
}
h1
{
	color:white;	
	
}
#midle
{
	height:600px;
	background:whitesmoke;
}
#total
{
  background:#E0E0E0;
  margin-top: 88px;
 margin-left: 200px;
 border-radius: 30px;

}
.log
{
	background:#D3D3D3;
	margin-left: 29px;


}
hr
{
	border-top:2px solid #5A5B5B;
}
h3
{
	margin-left: 32px;
	margin-top: 21px;
	color:#5AA0B0;	

}
#login
{
	margin-left: 29px;

}
span
{
	color:red;
}
p
{
	margin-top:20px;
	margin-left:49px;
}
.pagination
{
	margin-left:10px;

}
#footer
{
	height:100px;
	background:black;

}
</style>
<script type="text/javascript" language="javascript">
    function Validate()
    {
    var UName=document.getElementById('username');
    var Password=document.getElementById('password');
    	if((UName.value =='') || (Password.value ==''))
    	{
      		alert('UserName or Password should not be blank');
       		return false;
      
    	} 	
    }
</script>
</head>
<form name="login" method="post" action="" class="form-horizontal" onsubmit=Validate()>
<div class="nav-header">
  <h1>Fun.com</h1>
  <ul class="nav nav-pills">
	 <li><a href="index.php">Home</a></li>
    	<li><a href="register.php">Back</a></li>
  </ul>
</div>
<div class="row" id="midle">
<div class="container">
<div class="span6" id="total">
<div class="row">
<div class="span6">
	<img src="images/friend3.png" style="float:left; padding-top: 13px; margin-left: 19px;" />
	<h3><b>Sign In</b></h3>
	<hr>
</div>
</div>   
<div class="row" >
<div class="span6">   
	<div class="control-group"><!-- User Name-->
      <input type="text" name="username" id="username" placeholder="Your Username" class="log">
</div>

<div class="control-group"><!-- Password-->
      <input type="password"  name="password" id="password" placeholder="Your Password" class="log">
</div>
<div class="control-group">
			<input type="submit"  name="Login" class="btn btn-info" value="Login" id="login" />
    		
	</div>
</div>
</div>
<?php
		if (isset($_POST['Login'])) 
		{
			$username=$_POST['username'];
			$password=$_POST['password'];
			$adminlogin = mysql_query("select * from Userregistration where USERNAME='$username' and
  PASSWORD ='$password'");
			$values=mysql_fetch_array($adminlogin);
			if($values['role'] == 'admin')
			{
				session_register('adminuserid');
				$_SESSION['adminuserid']=$values['id'];
				header("Location:Admin/admnoperations.php");
			}
			else if($values['role'] == 'user')
			{	
			$login = mysql_query("select * from Userregistration where USERNAME = '$username' and
  PASSWORD ='$password'");
		if(mysql_num_rows($login) == 1) 
		{	 
               		$details=mysql_fetch_array($login);
		 	session_register('userid');
		 	$_SESSION['userid']=$details['id'];
      	 		header("Location:userdetails.php");
   		}
		}
	else 
	{

      			echo "<p> <font color=Red>Username and Password does not Match</font> </p>"; 
		
   	}
	

}
?>
</div>
</div>
</div>
<div class="footer" id="footer">
</div>
</form>
</body>
</html>
