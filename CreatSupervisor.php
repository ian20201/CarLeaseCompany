<?php
include 'connection.php';
$conn = connectMysql();
//$servername = "localhost";
//$username = "root"; // your username
//$password = "root"; //your password
//$database = "groupproject";
//// Create connection
//$conn = new mysqli($servername, $username, $password, $database);
//// Check connection
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}
//else {
//    echo "Connection Succesful! <br>";
//}
// Getting values
$userName = $_POST['username'];
$passWord_s = $_POST['password'];
$pass = password_hash($passWord_s,PASSWORD_DEFAULT);
$name = $_POST['name'];

//construct the query
$query = "INSERT INTO supervisor(SuperName,username,pass) VALUES('$name','$userName','$pass')";
//Execute the query
if ($conn->query($query) === TRUE) {
    echo "New record created successfully!";
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>