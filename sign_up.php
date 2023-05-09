<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
            align-content: center;
            background: url(pexels-oliver-sjöström-1433052.jpg);
            background-size: cover;
            height: 100vh;
        }
        fieldset{
            padding: 3em;
            border-color: aqua;
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
            outline-color: aqua;

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
            background-color: aqua;
        }
    </style>
   
</head>
<body>   
    <form method="POST">
        <h2>Sign Up</h2>


        <fieldset>

            <legend>Personal Information</legend>
            Username: <br>
            <input type='text' name='username'>
            <br>

            Password: <br>
            <input type="password" name="password">
            <br>

            Register: <br>
            <input type="submit" name="submit" id="submit" value='SUBMIT'>
        </fieldset>
    </form>
    
</body>
<?php
 
 $servername = 'localhost';
 $dbname = 'users';
 $username='root';
 $password='';
 $port=3366;
 
 
 $conne = new mysqli($servername,$username , $password,$dbname, $port);
 
 if($conne -> connect_error ){
     die('CONNECTION FAILED:' .$conne -> connect_error);
 }
 echo "CONNECTION SUCCESSFUL👍👌❤️😍";

 if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO user_credentials (username,password) ". "VALUES ('$username','$password')";

    $conne->query($sql);
    header('location:index.php');

    exit;
    

 } 

?>
</html>