<html>
<?php
include 'connection.php';
$conn = connectMysql();

// Getting values
$userName = $_POST['username'];
$passWord_s = $_POST['password'];
$usertype = $_POST['type'];

if($usertype == 'Customer'){
    $query = "select * from customers where username='$userName'";
    echo $usertype;
    echo "<br>";
}elseif ($usertype == 'Staff'){
    $query = "select * from staff where username='$userName'";
    echo $usertype;
    echo "<br>";
}else if($usertype == 'Supervisor'){
    $query = "select * from supervisor where username='$userName'";
    echo $usertype;
    echo "<br>";
}


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
    header("Location: staff.php? userName=$userName");
}elseif (password_verify($passWord_s, $row['pass']) && $usertype == 'Supervisor'){
    echo "login<br>";
    echo $row['SuperName'];
    echo "<br>";
    echo $usertype;
    header("Location: supervisor.php? userName=$userName");
}else{
    echo "Error wrong Password or Username";
}

$conn->close();
?>
<form method="post" action="AccountDetails.php"></form>
</html>
