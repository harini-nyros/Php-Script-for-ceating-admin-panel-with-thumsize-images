<?php
session_start();

if($_SESSION['adminuserid']=='')
{
header("Location:../index.php");
}
mysql_connect("localhost","root","root");
mysql_select_db("usersdb");
$name=mysql_query("SELECT name FROM admincat where parent_id=0");
$val =array();
while(($names=mysql_fetch_array($name))>0)
{
array_push($val,$names['name']);
}
?>
<html>
<head>
<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" href="../css/jquery-ui-1.10.2.custom.css">
<title>Read Categories</title>
<style>
#midle
{
	width:1200px;
	height:700px;
}
.cat
{
	color:red;
	text-transform:Capitalize;
	font-size:18px;
}
.center
{
	margin:auto;
}
.center div
{
	height:150px;
	margin-left:10px;
}
#category
{
	margin-top:10px;
	float:left;
}
#autocomplete
{
	height:30px;
}
</style>
<script src="../js/jquery.js"></script>
<script src="../js/jquery.autocomplete.js"></script>
<script src="../js/jquery-ui.js"></script>
<script type="text/javascript">
	$(function(){
	<?php		
		$sql1=mysql_query( "SELECT * FROM admincat where parent_id=0;");
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
</head>
<body>
<form name="form" action="" method="post">
<?php include 'header.php';?>
<div class="row" id="midle">
<div class="container center">
<div style="height:50px;margin-top:18px;margin-left:600px;">
<label for="autocomplete"></label>
<input type="text" id="autocomplete" name=name placeholder="search category" class="search-query" />
<input type="submit" value="Find it" name="find">
<?php
		if(isset($_POST['find']))
		{
			$nam=$_POST['name'];
			echo $nam;
			if(in_array($nam,$val))
			{
			$sql=mysql_query( "SELECT category_id FROM admincat where name='$nam';");
			//print_r($sql);
			$cat=mysql_fetch_array($sql);
			$catid= $cat['category_id'];
			header("Location:catlistings.php?id=$catid");
			}
			else
			{
				header("Location:nosearch.php");
			}
				


		}



?>
</form>
</div>
<?php
$result=MYSQL_QUERY("SELECT * from admincat where parent_id=0");
while($names=mysql_fetch_array($result))
{
$name=$names['name'];
$cid=$names['category_id'];
?>
<div class="span3" id=category>
<a href="catlistings.php?id=<?php echo $cid;?>" class="cat"><?php echo $name ?></a><br>
<?php
	$row=MYSQL_QUERY("SELECT * from admincat where parent_id=$cid");
	while($res=mysql_fetch_array($row))
	{
		$id=$res['category_id'];
		$sub_name=$res['name'];
	
?>
	<a href="sublistings.php?id=<?php echo $id;?>"><?php echo $sub_name;?></a><br>
<?php
	}
?>
</div>
<?php
}
?>

</div><!--End of contanier-->
</div><!--End of row-->
<?php include 'footer.php';?>
</body>
</html>

