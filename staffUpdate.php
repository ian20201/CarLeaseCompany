<?php
include 'connection.php';
$conn = connectMysql();
$AID = $_POST['AID'];
$purpose = $_POST['purpose'];


//construct the query
$query = "UPDATE appointment SET Purpose = $purpose WHERE AID = $AID";
//Execute the query
if ($conn->query($query) === TRUE) {
    echo "New record created successfully!";
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>