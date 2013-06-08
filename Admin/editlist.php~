<?php
session_start();
if($_SESSION['adminuserid']=='')
{
header("Location:../index.php");
}
mysql_connect("localhost","root","root");
mysql_select_db("usersdb");
//$userid=$_SESSION['userid'];
$id=$_GET['id'];
//echo $id;
$sql = mysql_query("SELECT * FROM admincat where category_id='$id'");
while ($row = mysql_fetch_array($sql)) 
{
$pid=$row['parent_id'];
//echo $pid;
$det= mysql_query("SELECT * FROM admincat where category_id='$pid'");
while ($rows = mysql_fetch_array($det)) 
{
	$subcid=$rows['category_id'];
	//echo $subcid;
	$subname=$rows['name'];
	//echo $subname;
	$catpid=$rows['parent_id'];
	//echo $catpid;
	$details= mysql_query("SELECT name FROM admincat where category_id='$catpid'");
	$cat=mysql_fetch_array($details);
	$catname=$cat['name'];
	//echo $catname;


}
$title  = $row['title'];
$contactperson  = $row['contactperson'];
$address  = $row['address'];
$mbno = $row['mbno'];
$email = $row['email'];
$des = $row['description'];
}
 if (isset($_POST['a']))	
	{
		$id=$_POST['a'];
		$det=MYSQL_QUERY("SELECT * from admincat where parent_id=$id");
	
?>
		<select name="subcategory">
		<option value="default">Select subcategory</option>
<?php	
		while($subrow=mysql_fetch_array($det))
		{
			
?>
		<option value="<?php echo $subrow['category_id']?>"><?php echo $subrow['name']?></option>
<?php	
		}
	
?>
	</select>
<?php
exit;
	}
?>
<html>
<head>
<title>Edit listings</title>
<link rel="stylesheet" href="../css/bootstrap.css">
<script src="../js/jquery.js"></script>
<style>
#add
{
		margin-left:211px;
}
#midle
{
	height:850px;
	background:whitesmoke;
}
#main
{
	margin:auto;
}
#total
{
	margin-top: 30px;
	margin-right: 119px;
	margin-left: 91px;
	background:#EBEBEB;
	border-radius:50px;
	height:800px;
	
}
h4
{
	margin-left:30px;
	font-size:20px;
	font-family:Times New Roman;
}
hr
{
	width: 730px;
	 
}
#span3
{
	margin-left:5px;

}
#span3 .controls
{ 
	margin-left:50px;
	margin-top:10px;

}
#span3 input
{
	height:30px;
	margin-top:10px;
}
h5
{
	color:#990000;
	font-size:18px;
	margin-left:10px;
}
.span5 input
{
	height:30px;
}
#result
{
	margin-left:162px;
}
</style>
</head>
<body>
<?php include 'header.php';?>
<form name="myform" action="" method="post">
<?php
		if (isset($_POST['edit'])) 
 		{
				$text=$_POST['title'];
				$contactperson=$_POST['contactperson'];
				$address=$_POST['address'];
				$email=$_POST['email'];
				$mbno=$_POST['mbno'];
				$des=$_POST['description'];
				$category=$_POST['category'];
				$subcategory=$_POST['subcategory'];
				$res=MYSQL_QUERY("UPDATE admincat SET parent_id='$subcategory',title='$text',contactperson='$contactperson',address='$address',email='$email',mbno='$mbno',
description='$des' WHERE category_id='$id'")or die (mysql_error());
		header("Location:listings.php?id=$pid");
		}
?>
<div class="row" id="midle">
<div class="container">
<div id="main" class="span12">
<div id="total">
<div class="row">
<div class="span12">
<a href="listings.php?id=<?php echo $pid?>">Back</a>
	<h4><b>Edit listings</b></h4> 
	<hr>
</div>
<div class="span5">
<div class="control-group">
    <label class="label">Title</label>
    <div class="controls">
      <input type="text" name="title" value="<?php echo $title;?>"/>
    </div>
</div>
<div class="control-group">
    <label class="label">Contact Person:</label>
    <div class="controls">
      <input type="text" name="contactperson" value="<?php echo $contactperson;?>" />
    </div>
</div>
<div class="control-group">
    <label class="label">Address:</label>
    <div class="controls">
      <textarea colspan="10" rowspan="10" name="address" id="address" ><?php echo $address;?></textarea>
    </div>
</div>
<div class="control-group">
    <label class="label">Moblie No:</label>
    <div class="controls">
      <input type="text" name="mbno" id="mbno" value="<?php echo $mbno ?>"/>
    </div>
</div>
<div class="control-group">
    <label class="label">Email:</label>
    <div class="controls">
      <input type="text" name="email" id="email" value="<?php echo $email?>" />
    </div>
</div>
<div class="control-group">
    <label class="label">Description</label>
    <div class="controls">
      <textarea cols="50" rows="10" name="description" id="description"><?php echo $des;?></textarea>
    </div>
</div>
<div class="control-group">
    <label class="label">Select Category</label>
    <div class="controls">
		<select name="category" onchange="return subCategory()" id="category" >
		<option value="default">Select category</option>
<?php
	$result=MYSQL_QUERY("SELECT * from admincat where parent_id=0");
	while($row=mysql_fetch_array($result))
	{
		if($row['category_id']==$catpid)
		{
?>
<option value="<?php echo $catpid;?>" selected='selected' /><?php echo $catname;?></option>
<?php	
		}
		else
		{
?>
<option value="<?php echo $row['category_id']?>"/><?php echo $row['name'];?></option>
<?php
	
	}
	}
?>
	</select>
	</div>
	</div>

   
<div id="sub">
 <label class="label">Select sub Category</label>
    <div class="controls">
    <select name="subcategory">
		<option value="default">Select sub category</option>
<?php
	$results=MYSQL_QUERY("SELECT * from admincat where parent_id=$catpid");
	while($rowsub=mysql_fetch_array($results))
	{
		if($rowsub['category_id']== $subcid)
		{
?>
<option value="<?php echo $subcid;?>" selected='selected' /><?php echo $subname;?></option>
<?php	
		}
		else
		{
?>
<option value="<?php echo $rowsub['category_id']?>"/><?php echo $rowsub['name'];?></option>
<?php
	
	}
	}
?>
	</select>
</div>
</div>
	

<div id="result"></div>
	<div class="control-group">
			<div class="controls">
			<input type="submit" name="edit" value="submit" class="btn btn-success" id="add"> 
				</div>
		</div>

</div><!--Closing of span6-->
</div><!--row-->
</div><!--total-->
</div><!--main-->
</div><!--Container closing-->
</div><!--Closing of row-->
<script type="text/javascript">
function newcategory()
{
	document.getElementById("showcategory").style.display="block";	


}
function subCategory()
{
	var a=document.getElementById("category").value;
	document.getElementById("sub").style.display="none";
	
	$.ajax({
  		type: 'POST',
  		url: 'editlist.php',
  		data: 'a='+a,
  		success: function(response)
		{
   			 $('#result').html(response);
  		}
});
	


}
</script>
<?php include 'footer.php';?>
</form>
</body>
</html>
