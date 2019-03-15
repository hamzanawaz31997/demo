<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>

    <div class="container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
        </div>
        <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>

</body>
</html>


<?php

$email = $pswd = "";

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
  

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = test_input($_POST["email"]);
    $pswd = test_input($_POST["pswd"]);

    echo $email . " " . $pswd;

    $conn = mysqli_connect("localhost","root","","wesehi");
    
    $sql = "INSERT INTO user (email, password)
    VALUES ('$email', '$pswd')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
    
}



?>
