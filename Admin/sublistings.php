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
$per_page = 2; 
$page = 1;
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
<title>SubcategoryListings</title>
<style>
#midle
{
	
	height:600px;
	margin:auto;
	margin-top:10px;
	background:#EBEBEB;
	border-radius:50px;
}
dt
{
	float:left;
	color:#3AA0BE;
	text-transform:capitalize;
	
}
#main
{
	border:2px solid black;
	height:200px;
	margin-top:20px;
	margin-bottom:10px;
	margin-left:100px;
}

dd
{
	font-size:15px;
}
#center
{
	height:500px;

}
.pagination
{
	margin-left:20px;
}
.dl-horizontal
{
	
}
.title
{
	color:#C55D00;
}
.edit
{
	margin-left:570px;
}
.des
{
}
</style>
</head>
<body>
<?php include 'header.php';?>
<div class="row">
<div class="container">
<div class="span11" id="midle">
<div id="center">
<a href="readcategories.php">Back</a>
<?php
$res=MYSQL_QUERY("SELECT * from admincat where parent_id=$id LIMIT $start_from, $per_page");
$charlimit = 100; 

if( mysql_num_rows($res) > 0)
{  
while ($row = mysql_fetch_array($res)) 
{
	//echo $per_page;
	$cid=$row['category_id'];
	$des=$row['description'];
	$desc = substr($des,0,$charlimit); 
?>
<div class="span8" id="main">
<div class="edit">
<a href="editlist.php?id=<?php echo $cid?>" style="float:left;margin-right:10px;" name=delete ><img src="../images/buttons.png" style="width:20px;height:20px;" title="for edit"></a>
<a href="deletelist.php?id=<?php echo $cid?>"name=delete ><img src="../images/_trash.gif" style="width:20px;height:20px;"></a>
</div>
<dl class="dl-horizontal">          
    <dt>Title: </dt>
    <dd class="title"><?php echo $row['title'];?></dd>         
    <dt>Contact Person:</dt>
    <dd><?php echo $row['contactperson'];?></dd>            
    <dt>Address:</dt>
    <dd><?php echo $row['address'];?></dd>              
    <dt>Mobile no:</dt>
    <dd><?php echo $row['mbno'];?></dd>
    <dt>Email:</dt>
    <dd><?php echo $row['email'];?></dd>
    <dt>Description</dt>
    <dd><?php echo $desc;?> <a href="viewmore.php?id=<?php echo $cid?>">view more>></a></dd>
</dl>
</div><!--main closing-->

<?php
}
?>
</div>

<div class="pagination">
<ul>
<li>
<?php
$total_rows = $total_rows[0];
 $total_pages = $total_rows / $per_page;
 $total_pages = ceil($total_pages);
for($i=1;$i<= $total_pages;++$i)
 {
 
  echo "<a href='?page=$i&id=$id'>$i</a>&nbsp &nbsp;";
 }
?>
</li>
</ul>
</div>
<?php 
}
?>
</div><!--Midle-->
</div><!--Container closing-->
</div><!--Row closing-->
<?php include 'footer.php';?>
</body>
</html>
