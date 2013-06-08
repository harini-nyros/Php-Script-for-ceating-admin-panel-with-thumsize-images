<?php
session_start();
if($_SESSION['adminuserid']=='')
{
header("Location:../index.php");
}
$id=$_GET['id'];
mysql_connect("localhost","root","root");
mysql_select_db("usersdb");
?>
<html>
<head>
<title>Delete Category</title>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<script src="../js/jquery.js"></script>
<script src="../js/boostrap-model.js"></script>
<script type="text/javascript">

$(document).ready(function() 
	{
		$("#example").show();


	});

</script>
<style>
body
{
	background:black;
}
</style>
</head>
<body> 
<form name="myform" method="post" action=""> 
<div class="container">  
<div id="example" class="modal hide fade in" style="display: none; ">  
<div class="modal-header">  
</div>  
<div class="modal-body">  
<h4>Do you want permanently delete the record</h4>                  
</div>  
<div class="modal-footer">  
<input type="submit" name="ok" class="btn btn-success" value=Yes />  
<input type="submit" name="cancel" class="btn" data-dismiss="modal" value="No"/>  
</div>  
</div>   
</div>
<?php
if(isset($_POST['ok']))
{
$query = mysql_query("DELETE FROM admincat WHERE category_id='$id'");
header("Location:categories.php");
}
if(isset($_POST['cancel'])) 
{
header("Location:categories.php");

}



?>
</form>  
</body>  
</html> 
