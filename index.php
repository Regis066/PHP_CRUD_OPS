<?php
session_start();


if (isset($_POST['username']) && isset($_POST['password'])) {
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "users";
    $port = 3366;
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name, $port);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Retrieve the user's credentials from the database
    $sql = "SELECT id FROM user_credentials WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        // If the credentials match, set a session variable and redirect to restricted page
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $row['id'];
        header('location: alloperations.php');
        $error_message ='';
        exit;
    } else {
        // If the credentials do not match, display an error message
        $error_message = "Invalid username or password. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css'>
    <style>
          *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: cursive;
        }
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url(willian.jpg);
            background-size: cover;
        }
        fieldset{
            padding:  30px;
            border-color: teal;
        }
        legend{
            text-transform: uppercase;
        }
        #usern,#pass{
            border-bottom-left-radius: 15px;
            border-top-right-radius: 20px;
            margin-top: 1.2em;
            height: 5vh;
            border: none;
            padding: 0 1.2em;
            outline-color: teal;

        }
        #submit{
            margin-top: 2em;
            width: 150px;
            height: 5vh;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            background-color: white;
            transition: background-color 2s ease-in-out;

        }
        #submit:hover{
            background-color: teal;
        }
        .error{
            color:red;
            font:bold;
        } 
    </style>
</head>
<body>
<form action="" method="POST">
    <h2>Login</h2>

    <fieldset>
        <legend>Personal Information</legend>
        <div class="cont">
            Username:
            <input type="text" name='username'><br>

            Password: 
            <input type="password" name="password">
            <br>

            Register: <br>
            <input type="submit" name="submit" id="submit">
        </div>
        <?php 
        if(!empty($error_message)){
            echo "<div class='error'>$error_message</div>";
        }
        ?>
       
    </fieldset>

    <a href="./sign_up.php">Don't have an account</a>
</form>

</body>
</html>
