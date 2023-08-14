<html>
    <head>
        <style>
            #table1{
                background-color: blue;
                color: aliceblue;
                padding: 20px;
            }
            #a1{
                color: aliceblue;
                background-color: transparent;
                text-decoration: none;
                font-size: 135%;
            }
            .form1{
                justify-content: center;
                display: flex;
                margin: 40px 50px;
                border: 3px solid blue;
                padding: 30px;
                background-color: rgb(208, 205, 248);
            }
            h1{
                color : rgb(242, 4, 190);
            }
        </style>
    </head>

    <?php
    $msg1=$msg2=$msg3=$msg4=$msg5=$msg6="";
    $validate=True;
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $Email = $_POST["Email"];
        $password = $_POST["Password"];
        if(empty($Email)) {
            $msg2="Enter your email";
            $validate=False;
        }
        else if(empty($password)) {
            $msg3="Enter your password";
            $validate=False;
        }
        if($validate == True) {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "Users";
            $conn = mysqli_connect($servername, $username, $password, $database);
            if (!$conn){
                die("Sorry we failed to connect: ". mysqli_connect_error());
            }
            $Email = stripcslashes($Email);  
            $password = stripcslashes($password);  
            $Email = mysqli_real_escape_string($conn, $Email);  
            $password = mysqli_real_escape_string($conn, $password);  
          
            $sql = "select *from registration where Email = '$username' and password = '$password'";  
            $result = mysqli_query($conn, $sql); 
              
            if($result){  
                echo "<center><h1 style = 'color:red'>Login Succesfull...</h1><br><h1><a href='Tournaments.html'>Click Here</a></h1></center>";  
            }  
            else{  
                echo "<h1> Login failed. Invalid username or password.</h1>";  
            } 
        }
    }
    ?>

    <body>
        <p style="font-size: 80px;">
            <img src="logo.JPG" width="7%" height="7%">
            SPORTS
            <table style="width: 100%;" id="table1">
                <tr>
                    <th><a href="Project%20S.html" id="a1">Home</a></th>
                    <th><a href="scheme.html" id="a1">Scheme/Gudilines</a></th>
                    <th><a href="Registration.php" id="a1">Registration</a></th>
                    <th><a href="Login.php" id="a1">Login</a></th>
                    <th><a href="contact.html" id="a1">Contact</a></th>
                    <th><a href="aboutus.html" id="a1">About Us</a></th>
                </tr>
            </table>
        </p>
        <div class="form1">
        <form method="POST" action="">
            <h1>Login</h1><br>
            Email Address<br>
            <input type="text" id="Email" name="Email"><br><br />
            Password<br>
            <input type="Password" id="Password" name="Password"><br><br />
            <table>
                <tr>
                    <td colspan="2" style="text-align: center;"><button type="submit">Log in</button></td> 
                </tr>
                <tr>
                    <td><a href="Registration.php">Register a New User?</a></td>
                </tr>
            </table>
        </form>
        </div>
    </body>
</html>