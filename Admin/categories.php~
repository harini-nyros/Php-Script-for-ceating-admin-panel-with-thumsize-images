<?php
session_start();

if($_SESSION['adminuserid']=='')
{
header("Location:../index.php");
}
mysql_connect("localhost","root","root");
mysql_select_db("usersdb");
$per_page = 5; 
$page = 1;
$name=mysql_query("SELECT COUNT(*) FROM admincat where parent_id=0");
$total_rows = mysql_fetch_row($name);
 if (isset($_GET['page'])) 
 {
  $page = intval($_GET['page']);
  if($page < 1) $page = 1;
}
$start_from = ($page - 1) * $per_page;
$det=mysql_query("SELECT * FROM admincat where parent_id=0");
$val =array();
while(($names=mysql_fetch_array($det))>0)
{
array_push($val,$names['name']);
}
?>
<html>
<head>
<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" href="../css/jquery-ui-1.10.2.custom.css">
<title>Categories</title>
<script src="../js/jquery.js"></script>
<script src="../js/jquery.autocomplete.js"></script>
<script src="../js/jquery-ui.js"></script>
<script type="text/javascript">
function showsub()
{
	document.getElementById("subtable").style.display="block";


}
$(function(){
	<?php		
		$sql1=mysql_query("SELECT * FROM admincat where parent_id=0");
		while ($det1=mysql_fetch_array($sql1))
		{
                 	$name=$det1['name'];
			$str1.='"'.$name.'",';
		}
		$str2=substr_replace("$str1","",-1);
	?> 
    $( "#autocomplete").autocomplete
	({
		source:[<?php echo $str2;?>] 
   	 });
});


</script>
<style>
#midle
{
	height:500px;
	
}
#autocomplete
{
	height:30px;

}
/*#example td
{
	width:100px;
}*/

</style>
</head>
<body>
<?php include 'header.php';?>
<form name="myform" action="" method="post">
<div class="row" id="midle">
<div class="container">
<div class="form-actions">
<label for="autocomplete"></label>
<input type="text" id="autocomplete" name=name placeholder="search category" class="search-query" />
</div>
<?php
if((isset($_POST['name']))  && ($_POST['name']!=''))
{
$q=$_POST['name'];
$sql=mysql_query("SELECT * FROM admincat WHERE name = '".$q."'");
?>
<div>
<a href="categories.php">Back</a>
<?php
$resultdiv="<table border='1' class='table table-striped table borderd'>
	    <tr class='info'>
	    <th>CategoryName</th>
	    <th>View Subcategories</th>
	    <th>Delete</th>
	    <th>Add</th>
	    </tr>";
if(in_array($q,$val))
{
	while($rows = mysql_fetch_array($sql))
  	{
	  $cat_id= $rows['category_id']; 
	  $resultdiv.= "<tr>";
  	  $resultdiv.= "<td>".$rows['name']."</td>";
	  $resultdiv.= "<td><a href='subcategories.php?id=".$cat_id."'>Click to view </a></td>";
 $resultdiv.= "<td><a href='deletecat.php?id=".$cat_id."'><img class='det' width=20px height=20px src='../images/_trash.png' /></a></td>";
  $resultdiv.= "<td><a href='addcat.php'><img class='det' width=20px height=20px src='../images/buttons.png'/></a></td>";
	$resultdiv.= "</tr>";
  	}
$resultdiv.= "</table>";
echo $resultdiv;
}
else
{
	 $resultdiv.= "<tr>";
	 $resultdiv.= "<td colspan='4'>".'no records found to your match'."</td>";
	$resultdiv.="</tr>";
	$resultdiv.= "</table>";
	echo $resultdiv;
}
?>
</div>
<?php
}
else
{
?>
<table id="example" class="table table-striped table-bordered" id="example">
<tr class='info'>
<th>CategoryName</th>
<th>View Subcategories</th>
<th>Delete</th>
<th>Add</th>

</tr>
<?php
$result=MYSQL_QUERY("SELECT * from admincat where parent_id=0 LIMIT $start_from, $per_page");
if( mysql_num_rows($result) > 0)
 { 
	while($row=mysql_fetch_array($result))
	{
	$cid= $row['category_id']; 
	
?>
<tr>
<td><?php echo $row['name']?></td>
<td><a href="subcategories.php?id=<?php echo $cid;?>">Click to view</a></td>
<td><a href="deletecat.php?id=<?php echo $cid;?>"><img class="det" width=20px height=20px src="../images/_trash.png"/></a></td>
<td><a href="addcat.php"><img class="det" width=20px height=20px src="../images/buttons.png"></td>
</tr>

<?php
}
}

?>
</table>
<div class="pagination">
<ul>
<li>
<?php
$total_rows = $total_rows[0];
//echo $total_rows;
 $total_pages = $total_rows / $per_page;
 $total_pages = ceil($total_pages); 
for($i=1;$i<= $total_pages;++$i)
 {
 
  echo "<a href='?page=$i'>$i</a>&nbsp &nbsp;";
 }
}

?>
</li>
</ul>
</div>
</div>
</div>
</form>
<?php include 'footer.php';?>
</body>
</html>
