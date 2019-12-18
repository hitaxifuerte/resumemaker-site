<?php
session_start();
$name=$_POST['name'];

$email=$_POST['email'];
$password=$_POST['password'];
$con= mysqli_connect("localhost", "root", "", "resumemaker");
if($con === false)
{
    die("connection failed.... " . mysqli_connect_error());
}
 
 $sql="select * from registration where email='$email';";
        $res=mysqli_query($con,$sql);
        if (mysqli_num_rows($res) > 0)
		{
        // output data of each row
        $row = mysqli_fetch_assoc($res);
        
        if($email==$row['email'])
        {
			echo "<script>alert('Email already exists... please enter another email....');";
			echo "window.location='signup.html'";
			echo "</script>";
        
			
        }
        else
		{
			
$qry = "insert into registration (name,email,password) VALUES ('$name','$email','$password')";
if(mysqli_query($con, $qry))
{
	$_SESSION["name"] = $name;
	$_SESSION["email"] = $email;
	echo $name;
	echo $email;
	echo "<script>alert('record insert sucessfully.......');";
	echo "window.location='login.html'";
	echo "</script>";
 
}
 else
 {
	  echo '<script language="javascript">';
		echo 'alert("error in data insert.....................")'. mysqli_error($con); 
 
		
		echo '</script>';
   
}
            
        }
		}




mysqli_close($con);
?>