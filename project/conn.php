<?php 
        include('conn.php');

        if(isset($_POST['loginbtn']))
        {
        	$user=$_POST['user'];
        	$pass=$_POST['pass'];
        
        

        	$sql = "select * from user where user = '$user' and pass = '$pass'";  
	        $result = mysqli_query($con, $sql);  
	        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
	        $count = mysqli_num_rows($result);  
	          
	        if($count == 1){ 


	            echo "<script>alert('Login Succesfull')</script>";
  				echo "<script>location.replace('index.php');</script>"; 
	        }  
	        else{  
	           echo "<script>alert('Invalid Credientials')</script>";
  				echo "<script>location.replace('login.php');</script>"; 
	        }     

        }

?>