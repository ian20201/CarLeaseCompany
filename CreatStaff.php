<?php
include 'connection.php';
$conn = connectMysql();


// Getting values
$userName = $_POST['username'];
$passWord_s = $_POST['password'];
$pass = password_hash($passWord_s,PASSWORD_DEFAULT);
//$email = $_POST['email'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];

//construct the query
$query = "INSERT INTO staff(username,pass,sfirstname,slastname) VALUES('$userName','$pass','$firstname','$lastname')";
//Execute the query
if ($conn->query($query) === TRUE) {
    echo "New record created successfully!";
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>