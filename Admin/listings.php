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
$sql1=mysql_query("SELECT COUNT(*) FROM admincat where parent_id=$id");
$total_rows = mysql_fetch_row($sql1);
//print_r($total_rows);
 if (isset($_GET['page'])) 
 {
  $page = intval($_GET['page']);
  if($page < 1) $page = 1;
}
$start_from = ($page - 1) * $per_page;
 //echo $start_from;
?>
<html>
<head>
<link rel="stylesheet" href="../css/bootstrap.css">
<title>Listings</title>
<style>
#midle
{
	height:700px;
}
.display
{
	margin-top:30px;

}
.det
{
	margin-left:10px;

}
</style>
</head>
<body>
<form name="form" action="" method="post">
<?php include 'header.php';?>
<div class="row" id="midle">
<div class="container" id="total">
<a href="categories.php">Back</a>
<div class="display">
<table id="example" class="table table-striped table-bordered" id="example" >
<tr>
<th>Title</th>
<th>Contact person </th>
<th>Mbno</th>
<th>Email</th>
<th>Add list</th>
<th>Delete list</th>
<th>Edit list</th>
</tr>
<?php
$res=MYSQL_QUERY("SELECT * from admincat where parent_id=$id ");
if(mysql_num_rows($res) == 0)
{
?>
<tr>
<td><?php echo $row['title']?></td>
<td><?php echo $row['contactperson']?></td>
<td><?php echo $row['mbno']?></td>
<td><?php echo $row['email']?></td>
<td><a href='addlist.php'><img class='det' src="../images/buttons.png" style="width:20px;height:20px;" title="for add"></a></td>
<td><a href="deletelist.php?id=<?php echo $cid?>"name=delete ><img class='det' src="../images/_trash.png" style="width:20px;height:20px;"></a></td>
<td><a href="editlist.php?id=<?php echo $cid?>"name=edit ><img class='det' width=20px height=20px src='../images/pencil.png'/></a></td>
</tr>
<?php
}
else
{  
while ($row = mysql_fetch_array($res)) 
{
	$cid=$row['category_id'];
?>
<tr>
<td><?php echo $row['title']?></td>
<td><?php echo $row['contactperson']?></td>
<td><?php echo $row['mbno']?></td>
<td><?php echo $row['email']?></td>
<td><a href='addlist.php'><img class='det' src="../images/buttons.png" style="width:20px;height:20px;" title="for add"></a></td>
<td><a href="deletelist.php?id=<?php echo $cid?>"name=delete ><img class='det' src="../images/_trash.png" style="width:20px;height:20px;"></a></td>
<td><a href="editlist.php?id=<?php echo $cid?>"name=edit ><img class='det' width=20px height=20px src='../images/pencil.png'/></a></td>
</tr>
<?php
}
}
?>
</table>
</div>
</div>
</div>
<?php include 'footer.php';?>
</body>
</html>
