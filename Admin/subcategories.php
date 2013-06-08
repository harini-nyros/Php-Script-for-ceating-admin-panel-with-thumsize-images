<?php
session_start();

if($_SESSION['adminuserid']=='')
{
header("Location:../index.php");
}
mysql_connect("localhost","root","root");
mysql_select_db("usersdb");
$id=$_GET['id'];
//echo $id;


?>
<html>
<head>
<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" href="../css/jquery-ui-1.10.2.custom.css">
<title>SubCategories</title>
<script src="../js/jquery.js"></script>
<script src="../js/jquery.autocomplete.js"></script>
<script src="../js/jquery-ui.js"></script>
</script>
<style>
#midle
{
	height:500px;
	
}
.display
{
	margin-top: 60px;

}
.det
{
	margin-left:60px;

}
</style>
</head>
<body>
<?php include 'header.php';?>
<form name="myform" action="" method="post">
<div class="row" id="midle">
<div class="container">
<a href="categories.php">Back</a>
<div class="display">
<table id="example" class="table table-striped table-bordered" id="example" >
<tr>
<th>Subcategory Name</th>
<th>View listings</th>
<th>Delete Subcategory</th>
<th>Add Subcategory</th>
</tr>
<?php
$result=MYSQL_QUERY("SELECT * from admincat where parent_id=$id");
if(mysql_num_rows($result) == 0)
{
?>
 <tr>
<td>No row found</td>
<td><a href="listings.php?id=<?php echo $cid;?>">Click to view</a></td>
<td><a href="deletesubcat.php?id=<?php echo $cid;?>"><img class="det" width=20px height=20px src="../images/_trash.png"/></a></td>
<td><a href="addsubcat.php?id=<?php echo $id;?>"><img class="det" width=20px height=20px src="../images/buttons.png"></td>
</tr>
<?php
}
else 
  {
	while($row=mysql_fetch_array($result))
	{
	$cid= $row['category_id'];
	//echo $cid; 
	$pid=$row['parent_id'];
	//echo $pid;
	

?>	
<tr>
<td><?php echo $row['name']?></td>
<td><a href="listings.php?id=<?php echo $cid;?>">Show</a></td>
<td><a href="deletesubcat.php?id=<?php echo $cid;?>"><img class="det" width=20px height=20px src="../images/_trash.png"/></a></td>
<td><a href="addsubcat.php?id=<?php echo $id;?>"><img class="det" width=20px height=20px src="../images/buttons.png"></td>
</tr>
<?php
}
}
?>
</table>
</div>
</div>
</div>
</div>
<?php include 'footer.php';?>
</body>
</html>


