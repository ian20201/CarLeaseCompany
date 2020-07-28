<?php
include 'connection.php';
$conn = connectMysql();
$AID = $_POST['AID'];
$carID = $_POST['CarId'];
$DID = $_POST['DID'];

//construct the query
$query = "UPDATE Cars SET AID = $AID WHERE CarId = $carID;";
//Execute the query
if ($conn->query($query) === TRUE) {
    echo "New record created successfully!";
} else {
    echo "Error: " . $conn->error;
}

$query2 = "INSERT INTO AttatchDriverLicence(AID,DID) VALUES('$AID','$DID')";
//Execute the query
if ($conn->query($query2) === TRUE) {
    echo "New record created successfully!";
} else {
    echo "Error: " . $conn->error;
}

header("Location: index.php");
$conn->close();
?>