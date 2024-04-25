<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM `registeration` WHERE username = '$username' AND password='$password'";
    $result=mysqli_query($con,$sql);

    if($result)
    {
        $num=mysqli_num_rows($result);
        if($num>0)
        {
            if(isset($_POST["remember"]))
            //when checkbox is checked
            {
                setcookie ("member_login",$username,time()+ (24 * 60 * 60));
                setcookie ("member_password",$password,time()+ (24 * 60 * 60));
                // $_SESSION["admin_name"] = $name;
            }
            else
            {
                if(isset($_COOKIE["member_login"]))
                {
                    setcookie ("member_login","");
                }
                if(isset($_COOKIE["member_password"]))
                {
                    setcookie ("member_password","");
                }
            }
            session_start();
            $_SESSION['username']=$username;
            echo "Login successfull";
            header('location:home.php');
        }
        else
        {
            echo "invalid credentials";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        
        button[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        
        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form action="login.php" method="post">
        <h1>Login Form</h1>
        Username: <input type="text" name="username" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>">
        Password: <input type="password" name="password" value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; } ?>">
        Remember me :
        <input type="checkbox" name="remember"
        <?php
        if(isset($_COOKIE["member_login"]))
        {
        ?> checked <?php
        }
        ?>
        />
        <button type="submit">Register</button>
    </form>
</body>
</html>