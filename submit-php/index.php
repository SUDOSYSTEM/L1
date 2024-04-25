<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission</title>
    <style>
       
      

        .output {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
    ?>
        <div class="output">
            <p>Usernameeee: <?php echo $username; ?></p>
            <p>Email: <?php echo $email; ?></p>
            <p>Password: <?php echo $password; ?></p>
        </div>
    <?php
    }
    ?>
</body>
</html>