<?php
?>
<html>
<head>
<style>
.nav-header
{
		background:black;		
}
.nav nav-pills a
{
	font-size:20px;
}
h1
{
	color:white;
	text-align:center;
	text-transform:capitalize;
	font-family:myOwnFont1;
	margin-top:20px;
}
@font-face
{
	font-family:myOwnFont1;
	src:url('../css/fonts/alex-brush/AlexBrush-Regular-OTF.otf');

}
.lgt
{
	float:right !important;
}
</style>
</head>
<body>
<div class="nav-header">
<h1><b>Administration</b></h1>
<ul class="nav nav-pills">
	<li><a href="admnoperations.php">Users</a></li>
	<li><a href="categories.php">categories</a></li>
  <li class="lgt"><a href="admnoperations.php?logout=Logout"/>LOGOUT</a></li>
 
</ul>
</div>
</body>
</html>
