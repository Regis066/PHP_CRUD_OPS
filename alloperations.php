<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY CRUD OPS</title>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css'>
</head>
<body>
   <div class='container my-5'>
    <h2>List of Users</h2>
    <div class="flex">
    <a class='btn btn-primary' href="./create.php" role='button'>New Client</a>
    <a class='text-red' href="./generate_pdf.php">PDF</a>
    </div>
   
    <br>
    <table class='table'>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
<?php

include 'connection.php';

//READ ALL ROW FROM DATABASE TABLE
$sql = "SELECT * FROM clients;";
$result = $conne ->query($sql);

if(!$result){
    die("Invalid query:" .$conne->error);
}

//READ ALL DATA OF EACH ROW 
while($row = $result ->fetch_assoc()){
    echo "
    <tr>
    <td>$row[id]</td>
    <td>$row[name]</td>
    <td>$row[email]</td>
    <td>$row[phone]</td>
    <td>$row[address]</td>
    <td>$row[created_at]</td>
    <td>
        <a class='btn btn-primary btn-sm' href='./edit.php?id=$row[id]'>Edit</a>
        <a class='btn btn-danger btn-sm' href='./delete.php?id=$row[id]'>Delete</a>
    </td>
</tr>
    ";
}
?>
        </tbody>



    </table>

   </div> 
</body>
</html>