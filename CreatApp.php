<html>
<?php
include 'connection.php';
$conn = connectMysql();

// Getting values
$CID = $_POST['CID'];
$appDate = $_POST['date'];
$appTime = $_POST['time'];
$SID = $_POST['staffInfo'];
$user = getUserByCID($CID,$conn);
if (!$user) {
    echo "User not found";
    die();
}
echo $SID;
$userName = $user['name'];
$appointments = getAppointmentByUser($CID,$conn);


//Execute the query
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    //echo $row;
} else {
    echo "0 results";
}

//echo $passWord_s;
if (password_verify($passWord_s, $row['pass']) && $usertype == 'Customer') {
    echo "login<br>";
    echo $row['CID'];
    echo "<br>";
    echo $usertype;
//    $_SESSION['username'] = $userName;
    header("Location: AccountDetails.php? userName=$userName");

}elseif (password_verify($passWord_s, $row['pass']) && $usertype == 'Staff'){
    echo "login<br>";
    echo $row['SID'];
    echo "<br>";
    echo $usertype;
}elseif (password_verify($passWord_s, $row['pass']) && $usertype == 'Supervisor'){
    echo "login<br>";
    echo $row['SuperName'];
    echo "<br>";
    echo $usertype;
}else{
    echo "Error wrong Password or Username";
}

$conn->close();
?>
<form method="post" action="AccountDetails.php"></form>
</html>
