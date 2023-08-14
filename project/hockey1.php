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
                color : rgb(78, 247, 6);
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
        $role = $_POST["role"];
        $sf = $_POST["sf"];
        $od = $_POST["od"];
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
        else if(empty($role)) {
            $msg3="Reuired section";
            $validate=False;
        }
        else if(empty($od)) {
            $msg5="Required section";
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
                $sql = "INSERT INTO `hockey` 
                        VALUES ('$name', '$email', '$role','$od', '$phno' , '$pincode')";
                $result = mysqli_query($conn, $sql);
                if($result){
                    echo 'Registration Successfull....';
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
                    <th><a href="Login.html" id="a1">Login</a></th>
                    <th><a href="contact.html" id="a1">Contact</a></th>
                    <th><a href="aboutus.html" id="a1">About Us</a></th>
                </tr>
            </table>
        </p>
        <div class="form1">
        <form name="Reg_form" method="post" action="">
        <h1>Registration</h1><br>
            Player Name<br>
            <input type="text" id="Name" name="Name" size="50">
            <span id="abd"><?php echo $msg1; ?></span><br><br />
            Email Address<br>
            <input type="text" id="Email" name="Email" size="50">
            <span id="abd"><?php echo $msg2; ?></span><br><br />
            role<br>
            <input type="text" id="role" name="role" size="50">
            <span id="abd"><?php echo $msg4; ?></span><br><br />
            Offence or Defence<br>
            <input type="text" id="od" name="od" size="50">
            <span id="abd"><?php echo $msg4; ?></span><br><br />
            U19 or Above<br>
            <input type="text" id="age" name="age" size="50">
            <span id="abd"><?php echo $msg4; ?></span><br><br />
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