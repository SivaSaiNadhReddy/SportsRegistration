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
        $amount = $_POST["Amount"];
        if(empty($name)) {
            $msg1="Enter your name";
            $validate=False;
        }
        else if(empty($email)) {
            $msg2="Enter your email";
            $validate=False;
        }
        else if(empty($amount)) {
            $msg3="Enter Donation Amount";
            $validate=False;
        }
        if($validate == True) {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "database";
            $conn = mysqli_connect($servername, $username, $password, $database);
            if (!$conn){
                die("Sorry we failed to connect: ". mysqli_connect_error());
            }
            else{ 
                $sql = "INSERT INTO `donate` 
                        VALUES ('$name', '$email', '$amount')";
                $result = mysqli_query($conn, $sql);
                if($result){
                    echo 'Registration Successfull. Now you can go back and login...';
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
            Name<br>
            <input type="text" id="Name" name="Name" size="50">
            <span id="abd"><?php echo $msg1; ?></span><br><br />
            Email Address<br>
            <input type="text" id="Email" name="Email" size="50">
            <span id="abd"><?php echo $msg2; ?></span><br><br />
            amount<br>
            <input type="text" id="Amount" name="Amount" size="50">
            <span id="abd"><?php echo $msg3; ?></span><br><br />
            <button type="submit">Donate</button>
        </form>
        </div>
    </body>
</html>