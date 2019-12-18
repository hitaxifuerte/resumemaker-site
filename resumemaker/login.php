<?php
session_start();
$email=$_POST['email'];
$password=$_POST['password'];
$con= mysqli_connect("localhost", "root", "", "resumemaker");


if($con === false)
{
    die("connection failed.... " . mysqli_connect_error());
}
$sql = "SELECT * FROM registration where email='$email' and password='$password' ";
$result = $con->query($sql);

if ($result->num_rows > 0) 
{
	
	
	$_SESSION["email"] = $email;

	echo $email;
	echo "<script>alert('you have login......');";
	echo "window.location='resumebuilder.html'";
	echo "</script>";
}
else
 {
	  echo '<script language="javascript">';
		echo 'alert("error in data insert.....................")'. mysqli_error($con); 
 
		
		echo '</script>';
   
}


mysqli_close($con);

?>