<?php
session_start();

if($_SESSION['adminuserid']=='')
{
header("Location:../index.php");
}
if (isset($_GET['logout'])) 
		{
			session_destroy(); 
			header("Location:../login.php");
		}

$userid=$_SESSION['userid'];
$per_page = 5; 
$page = 1;
mysql_connect("localhost","root","root");
mysql_select_db("usersdb");
$sql1=mysql_query("SELECT COUNT(*) FROM Userregistration where role='user'");
$total_rows = mysql_fetch_row($sql1);
 if (isset($_GET['page'])) 
 {
  $page = intval($_GET['page']);
  if($page < 1) $page = 1;
}
$start_from = ($page - 1) * $per_page;
$val =array();
$name=mysql_query("SELECT UserName FROM Userregistration where role='user'");
while(($names=mysql_fetch_array($name))>0)
{
array_push($val,$names['UserName']);
}
?>
<html>
<head>
<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" href="../css/jquery-ui-1.10.2.custom.css">
<title>Users</title>
<script src="../js/jquery.js"></script>
<script src="../js/jquery.autocomplete.js"></script>
<script src="../js/jquery-ui.js"></script>
<style>
input.search-query 
{
	height:30px;
	background:url('images/search.png');
	background-repeat:no-repeat;
	background-position: 172px;
	background-color: white;
}
#out
{
margin-left: 828px;

}
#midle
{
	height:650px;
}
</style>
<script type="text/javascript">
	$(function(){
	<?php		
		$sql1=mysql_query( "SELECT * FROM Userregistration where role='user'");
		while ($det1=mysql_fetch_array($sql1))
		{
                 	$username=$det1['UserName'];
			$str1.='"'.$username.'",';
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
<?php include 'header.php';?>
<form name="myform" action="admnoperations.php" method="post">
<div class="row" id="midle">
<div class="container">
<div class="form-actions">
<label for="autocomplete"></label>
<input type="text" id="autocomplete" name="name" placeholder="search" class="search-query" />
</form>
</div>
<div class="main">
<?php
if((isset($_POST['name'])) && ($_POST['name']!=''))
{
$q=$_POST["name"];
$sql="SELECT * FROM Userregistration  WHERE UserName = '".$q."'";
$result = mysql_query($sql);
?>
<div>
<a href="admnoperations.php">Back</a>
<?php
$resultdiv="<table border='1' class='table table-striped table borderd'>
<tr class='info'>
<th>UserName</th>
<th>FirstName</th> 
<th>Gender</th> 
<th>DateOfBirth</th> 
<th>Email</th>
<th>Thumbsize</th>
<th>Delete</th>
<th>Edit</th>
<th>Add</th>
<th>Mail</th>

</tr> 
</tr>";
if(in_array($q,$val))
{
while($row = mysql_fetch_array($result))
  {
	$dateofbirth = $row['DateOfBirth'];
	$date=date("jS M Y",strtotime($dateofbirth));
	$profilepic = $row['ProfilePic'];
	$file="../uploads/Thumbsizes/".$profilepic;
	$id=$row['id'];
  $resultdiv.= "<tr>";
  $resultdiv.= "<td>".$row['UserName']."</td>";
  $resultdiv.= "<td>".$row['FirstName']."</td>";
  $resultdiv.= "<td>".$row['Gender']."</td>";
  $resultdiv.= "<td>".$date ."</td>";
  $resultdiv.= "<td>".$row['Email'] . "</td>";
  $resultdiv.="<td><img src='$file'></td>";
  $resultdiv.= "<td><a href='delete.php?id=".$id."'><img class='det' width=20px height=20px src='../images/1366453824_delete_user.png'/></a></td>";
 $resultdiv.= "<td><a href='editadmin.php?id=".$id."'><img class='det' width=20px height=20px src='../images/pencil.png'/></a></td>";
  $resultdiv.= "<td><a href='add.php'><img class='det' width=20px height=20px src='../images/add.png'/></a></td>";
  $resultdiv.= "<td><a href='mail.php?id=".$id."'><img class='det' width=20px height=20px src='../images/mail.png'/></a></td>";
 
 $resultdiv.= "</tr>";
  }
$resultdiv.= "</table>";
echo $resultdiv;
}
else
{
	 $resultdiv.= "<tr>";
	 $resultdiv.= "<td colspan='10'>".'no records found to your match'."</td>";
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
<div>
<table id="example" class="table table-striped table-bordered" id="example" >
<tr>
<th>UserName</th>
<th>FirstName</th> 
<th>Gender</th> 
<th>DateOfBirth</th> 
<th>Email</th>
<th>Thumbsize</th>
<th>Delete</th>
<th>Edit</th>
<th>Add</th>
<th>Mail</th>

</tr> 
<tr>
<?php
 $current_items = mysql_query( "SELECT * FROM Userregistration where role='user' LIMIT $start_from, $per_page");
if( mysql_num_rows($current_items) > 0)
 {   
while ($row = mysql_fetch_array( $current_items)) 
{
$id=$row['id'];
$username  = $row['UserName'];
$password  = $row['Password'];
$firstname = $row['FirstName']; 
$gender = $row['Gender']; 
$dateofbirth = $row['DateOfBirth'];
$date=date("jS M Y",strtotime($dateofbirth));
$email   = $row['Email'];
$profilepic = $row['ProfilePic'];
$role=$row['role'];
?>
<tr>
<td><b><?php echo $username; ?></b></td>
<td><b><?php echo $firstname;?></b></td>
<td><b><?php echo $gender; ?></b></td>
<td><b><?php echo $date; ?></b></td>
<td><b><?php echo $email; ?></b></td>
<td><img src="<?php echo '../uploads/Thumbsizes/'.$profilepic;?>"/></td>
<td><a href="delete.php?id=<?php echo $id;?>"><img class="det" width=20px height=20px src="../images/1366453824_delete_user.png"/></a></td>
<td><a href="editadmin.php?id=<?php echo $id;?>"><img class="det" width=20px height=20px src="../images/pencil.png"></a></td>
<td><a href="add.php"><img class="det" width=20px height=20px src="../images/add.png"></a></td>
<td><a href="mail.php?id=<?php echo $id;?>"><img class="det" width=30px height=30px src="../images/mail.png"></a></td>

</tr>
<?php
}
}
 else
 {
  echo 'this page does not exists'; 
 }
 $total_rows = $total_rows[0];
 $total_pages = $total_rows / $per_page;
 $total_pages = ceil($total_pages); 
?>
</table>
</div>
<div class="pagination">
<ul>
<li>
<?php
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
</div>
<?php include 'footer.php';?>
</body>

</html>
