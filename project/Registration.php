<html>
    <head>
        <style>
            #table1{
                background-color: blue;
                color: aliceblue;
                padding: 20px;
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
            #abd{
                color:rgb(255, 0, 0);
            }
            #a1{
                color: aliceblue;
                background-color: transparent;
                text-decoration: none;
                font-size: 135%;
            }
        </style>
    </head>

    <?php
    $msg1=$msg2=$msg3=$msg4=$msg5=$msg6="";
    $validate=True;
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST["Name"];
        $email = $_POST["Email"];
        $pass = $_POST["Password"];
        $cpass = $_POST["Confirm_Password"];
        $phno = $_POST["phNumber"];
        $pincode = $_POST["PinCode"];
        if(empty($name)) {
            $msg1="Enter your name";
            $validate=False;
        }
        else if(empty($email)) {
            $msg2="Enter your email";
            $validate=False;
        }
        else if(empty($pass)) {
            $msg3="Enter your password";
            $validate=False;
        }
        else if(empty($cpass)) {
            $msg4="Enter your password";
            $validate=False;
        }
        else if($pass != $cpass) {
            $msg4="Two passwords must be same";
            $validate=False;
        }
        else if(empty($phno)) {
            $msg5="Enter your Phone number";
            $validate=False;
        }
        else if(empty($pincode)) {
            $msg6="Enter your pincode";
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
            else{ 
                $sql = "INSERT INTO `registration` 
                        VALUES ('$name', '$email', '$password', '$phno' , '$pincode')";
                $result = mysqli_query($conn, $sql);
                if($result){
                    echo 'Registration Successfull. Now you can go back and login...';
                }
                $sql1 = "INSERT INTO `reg` 
                        VALUES ('$email', '$password')";
                $result1 = mysqli_query($conn, $sql1);
                if($result1){
                    echo '';
                }
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
                    <th><a href="Registration.html" id="a1">Registration</a></th>
                    <th><a href="Login.php" id="a1">Login</a></th>
                    <th><a href="contact.html" id="a1">Contact</a></th>
                    <th><a href="aboutus.html" id="a1">About Us</a></th>
                </tr>
            </table>
        </p>
        <div class="form1">
        <form name="Reg_form" method="post" action="">
        <h1>Registration</h1><br>
            Name of the Applicant<br>
            <input type="text" id="Name" name="Name" size="50">
            <span id="abd"><?php echo $msg1; ?></span><br><br />
            Email Address<br>
            <input type="text" id="Email" name="Email" size="50">
            <span id="abd"><?php echo $msg2; ?></span><br><br />
            Password<br>
            <input type="Password" id="Password" name="Password" size="50">
            <span id="abd"><?php echo $msg3; ?></span><br><br />
            Confirm Password<br>
            <input type="Password" id="Confirm_Password" name="Confirm_Password" size="50">
           <span id="abd"><?php echo $msg4; ?></span><br><br />
            Choose your Sport<br>
            <select name="sportList" size="6">
                <option value="Cricket" selected>Cricket</option>
                <option>Football</option>
                <option>Tennis</option>
                <option>Golf</option>
                <option>Hockey</option>
                <option>Baseball</option>
            </select><br><br />
            Mobile Number<br>
            <input type="text" id="phNumber" name="phNumber" size="50">
            <span id="abd"><?php echo $msg5; ?></span><br><br />
            Date of Birth<br>
            <input type="date" id="DOB"><br><br />
            Pin Code<br>
            <input type="text" id="PinCode" name="PinCode" size="50">
            <span id="abd"><?php echo $msg6; ?></span><br><br />
            <button type="submit">Register</button>
        </form>
        </div>
    </body>
</html>