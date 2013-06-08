<?php
session_start();

if($_SESSION['adminuserid']=='')
{
header("Location:../index.php");
}
mysql_connect("localhost","root","root");
mysql_select_db("usersdb");
 if (isset($_POST['a']))	
	{
		$id=$_POST['a'];
		$det=MYSQL_QUERY("SELECT * from admincat where parent_id=$id");
	
?>
		<select name="subcategory" id="subcat">
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
<link rel="stylesheet" href="../css/bootstrap.css">
<script src="../js/listvalidation.js"></script>
<script src="../js/jquery.js"></script>
<title>Add listing</title>
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
<form name="myForm" action="" method="post" onsubmit="return formValidate(this)">
<?php
		if (isset($_POST['add'])) 
 		{
				$text=$_POST['title'];
				$contactperson=$_POST['contactperson'];
				$address=$_POST['address'];
				$email=$_POST['email'];
				$mbno=$_POST['mbno'];
				$des=$_POST['description'];
				$category=$_POST['category'];
				$subcategory=$_POST['subcategory'];
					//echo $subcategory;
echo "INSERT INTO admincat(name,parent_id,title,contactperson,address,mbno,email,description)"."VALUES('null','$subcategory','$text','$contactperson','$address','$mbno','$email','$des')";
				$res=MYSQL_QUERY('INSERT INTO admincat(name,parent_id,title,contactperson,address,mbno,email,description) VALUES("null","'.$subcategory.'","'.$text.'","'.$contactperson.'","'.$address.'","'.$mbno.'","'.$email.'","'.$des.'")')or die (mysql_error());
		header("Location:categories.php");
		}
?>
<div class="row" id="midle">
<div class="container">
<div id="main" class="span12">
<div id="total">
<div class="row">
<div class="span12">
	<h4><b>Add listings</b></h4> 
	<hr>
</div>
<div class="span5">
<div class="control-group">
    <label class="label">Title</label>
    <div class="controls">
      <input type="text" name="title" id="title" />
    </div>
</div>
<div class="control-group">
    <label class="label">Contact Person:</label>
    <div class="controls">
      <input type="text" name="contactperson" id="contactperson" />
    </div>
</div>
<div class="control-group">
    <label class="label">Address:</label>
    <div class="controls">
      <textarea colspan="10" rowspan="10" name="address" id="address"></textarea>
    </div>
</div>
<div class="control-group">
    <label class="label">Moblie No:</label>
    <div class="controls">
      <input type="text" name="mbno" id="mbno"  />
    </div>
</div>
<div class="control-group">
    <label class="label">Email:</label>
    <div class="controls">
      <input type="text" name="email" id="email"  />
    </div>
</div>
<div class="control-group">
    <label class="label">Description</label>
    <div class="controls">
      <textarea cols="50" rows="10" name="description" id="description"></textarea>
    </div>
</div>
<div class="control-group">
    <label class="label">Select Category</label>
    <div class="controls">
		<select name="category" onchange="subcategory(this.value)" id="cat"/>
		<option value="default">Select category</option>
<?php
	$result=MYSQL_QUERY("SELECT * from admincat where parent_id=0");
	while($row=mysql_fetch_array($result))
	{

?>
		<option value="<?php echo $row['category_id']?>"><?php echo $row['name']?></option>
<?php
	}
?>
	</select>
	</div>
	</div>
	<div id="result"></div>
	<div class="control-group">
			<div class="controls">
				<input type="submit" name="add" value="Submit" class="btn btn-success" id="add">
				<input type="button" value=Reset onclick=resetdet() class="btn btn-info" /> 
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
function subcategory(a)
{
	
	
	$.ajax({
  		type: 'POST',
  		url: 'addlist.php',
  		data: 'a='+a,
  		success: function(response)
		{
   			 $('#result').html(response);
  		}
});
	


}
function resetdet()
{
	document.getElementById("title").value="";
	document.getElementById("contactperson").value="";
	document.getElementById("address").value="";
	document.getElementById("mbno").value="";
	document.getElementById("email").value="";
	document.getElementById("description").value="";
	document.getElementById("cat").value="default";
	document.getElementById("subcat").value="default";
} 
</script>
<?php include 'footer.php';?>
</form>
</body>
</html>
