<?php
//pass global variables
session_start();

//get values entered by user
$email = strip_tags($_POST['email']);
$password = strip_tags($_POST['pass']);

function test_data($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//"clean up" entered data
$email = test_data($email);
$password = test_data($password);

//connect to server and select database
$conn = mysqli_connect("localhost", "root", "", "kojeneration");
$sql = "SELECT * from admin where email = '$email' and passw = '$password'";

//query database for user
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$row = mysqli_fetch_row($result);

//compare entered inputs with database entry
if($row[3] == $email && $row[4] == $password)
{
    $_SESSION['status'] = 'logged-in';
    header('Location: participants.php');
}   
else{
     header('Location: index.php');
}

?>