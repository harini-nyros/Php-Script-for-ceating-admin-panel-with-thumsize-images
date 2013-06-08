<?php
session_start();
if($_SESSION['adminuserid']=='')
{
header("Location:../index.php");
}
$id=$_GET['id'];
mysql_connect("localhost","root","root");
mysql_select_db("usersdb");
$sql=mysql_query( "SELECT parent_id from admincat where category_id=$id");
$cat=mysql_fetch_array($sql);
$p_id=$cat['parent_id'];
//echo $p_id;
if(isset($_POST['add'])) 
	{
		$addnew=$_POST['addnew'];
		MYSQL_QUERY("INSERT INTO admincat(name,parent_id)"."Values('$addnew','$id')");
		header("Location:subcategories.php?id=$id");

	}
?>
<html>
<head>
<title>Add Subcategory</title>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<script src="../js/jquery.js"></script>
<script type="text/javascript">
function newcategory()
{
	document.getElementById("showcategory").style.display="block";
	document.getElementById("add").style.display="block";	


}
</script>
<style>
#midle
{
	height:500px;
	width:1000px;
}
#showcategory
{
	height:30px;
	margin-top:10px;
}
h5
{
	color:#990000;
	font-size:18px;
	
}
.span4
{
	margin-left: 261px;
	margin-top: 34px;
}

</style>
</head>
<body>
<?php include 'header.php';?>
<form name="myform" action="" method="post">
<div class="row" id="midle">
<div class="container">
<div class="back">
<a href="subcategories.php?id=<?php echo $id?>">Back</a>
</div>
<div class="span4" id="span3">
<h5>Want to add a new  sub category?</h5>
<div class="control-group">
		<div class= "controls">
		<input type=button onClick="newcategory();" value="Add SubCategory" class="btn btn-info"/><br>
	<input type="text" style="display:none" id="showcategory" placeholder="Add New SubCategory" name="addnew">
	<input type="submit" value=submit name=add style="display:none" id=add class="btn btn-info" /> 
		</div>
</div><!--Closing of controlgroup-->
</div><!--Closing of Span4-->
</div>
</div>
</form>
<?php include 'footer.php';?>
</body>
</html>
