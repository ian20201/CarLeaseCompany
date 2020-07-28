<?php
include 'connection.php';
$conn = connectMysql();
$AID = $_POST['AID'];
$carID = $_POST['CarId'];
$IID = $_POST['insuranceID'];

//construct the query
$query = "UPDATE Cars SET AID = $AID WHERE CarId = $carID;";
//Execute the query
if ($conn->query($query) === TRUE) {
    echo "New record created successfully!";
} else {
    echo "Error: " . $conn->error;
}

if($IID != "0"){
    $query2 = "INSERT INTO AttachInsurance(AID, IID) VALUES('$AID','$IID')";
//Execute the query
    if ($conn->query($query2) === TRUE) {
        echo "New Insurance record created successfully!";
        header("Location: index.php");
    } else {
        echo "Error: " . $conn->error;
    }
}


//header("Location: index.php");
$conn->close();
?>