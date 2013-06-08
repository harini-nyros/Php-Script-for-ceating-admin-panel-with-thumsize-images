<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/app.css">
<title>Assignment7</title>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script type="text/javascript">
$(document).ready(function()
		{
			$("#home").click(function()
				{
					$("#menu").show('slow');


				});
			$("#fungames").click(function()
				{
					$("#menu").toggle('slow');


				});
		});
</script>
<style>
#menu
{
background:#2D95EC;
}
#menu li :hover
{
background:#EBF6F8;
color:black;
}
#menu li a
{
color:white;
}
</style>
</head>
<body>
<form name="Appform" method="post" action="">
<div class="nav-header">
<h1>Fun.com</h1>
<ul class="nav nav-pills">
	 <li id="home"><a href="#" onclick="homefun()">Home</a>
<div class="dropdown">
<ul class="dropdown-menu"   id="menu">
  <li><a href="#">Action</a></li>
  <li><a href="#">Another action</a></li>
  <li><a href="#">Something else here</a></li>
</ul>
</div></li>
	  <li id="fungames"><a href="#">Fun Games</a></li>
	  <li><a href="#">Fun Quizzes</a></li>
  </ul>
</div>
<div class="row" id="midle">
<div class="center" id="imagdiv">
<div class="span7" >
<img src="images/funimg.jpg" class="midleimg img-polaroid"/>

</div>
<?php
if(!isset($_SESSION['userid']))
{

?>
<div class="span7" id="btnblack">
<b class="text-error">New User ?</b><br/>
<input type=submit name="Registration" value ="Registration >>" class="btn btn-info"/><br/>
<?php
	if (isset($_POST['Registration']))
	{
		header("Location:register.php");
	}

?>
<b class="text-error">If already member please login</b><br/>
<input type=submit name="Login" value ="Login >>" class="btn btn-info"/><br/>
<?php
	if (isset($_POST['Login']))
	{
		header("Location:login.php");
	}


?>
<?php
}
?>
</div>
<h3>Fum.com Brings all the fun related items which provides more fun to the users.
It has the features like playing games and watching videos.Fun.com has been developed with kids, parents and teachers in mind to provide access to a virtual world full of interactive learning games, online stories, informative and fun videos as well as comics and cartoons where kids can play in complete safety. </h3>
</div><!--Container--->
</div><!--Row-->
</div>

<div class="footer" id="footer">
</div><!--Footer-->
</form>
</body>
</html>
