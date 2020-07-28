<?php
function connectMysql()
{
    $servername = "ec2-18-222-115-143.us-east-2.compute.amazonaws.com";
    $username = "root"; // your username
    $password = "#utGaqnUd91i"; //your password
    $database = "GroupProject";
    $conn = new mysqli($servername, $username, $password, $database);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        echo "Connection Succesful! <br>";
    }
    return $conn;
}

function getUserByUserName($userName,$conn){
    $query = "select * from customers where username='$userName'";
    //Execute the query
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        //echo $row;
    } else {
        return null;
    }
    return $row;
}

function getUserByCID($CID,$conn){
    $query = "select * from customers where CID='$CID'";
    //Execute the query
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        //echo $row;
    } else {
        return null;
    }
    return $row;
}

function getAppointmentByUser($CID,$conn){
    $query = "select * from appointment where CID='$CID'";
    //Execute the query
    $result = $conn->query($query);
    $appointments=[];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()){
            $appointments[]=$row;
        }
        //echo $row;
    } else {
        return null;
    }
    return $appointments;
}

function getAppointmentByAID($AID,$conn){
    $query = "select * from appointment where AID='$AID'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        //echo $row;
    } else {
        return null;
    }
    return $row;
}

function getAllStaff($conn){
    $query = "select SID,slastname,sfirstname from staff";
    //Execute the query
    $result = $conn->query($query);
    $staffList=[];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()){
            $staffList[]=$row;
        }
        //echo $row;
    } else {
        return null;
    }
    return $staffList;
}

function getStaffBYSID($conn,$SID){
    $query = "select slastname,sfirstname from staff where SID='$SID'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        //echo $row;
    } else {
        return null;
    }
    return $row;
}

function getStaffByUserName($username,$conn){
    $query = "select * from staff where username = '$username'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        //echo $row;
    } else {
        return null;
    }
    return $row;
}

function getAllStaffwithAID($conn,$AID){
    $query = "select SID from arrange where AID = '$AID'";
    //Execute the query
    $result = $conn->query($query);
    $staffList=[];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()){
            $staffList[]=$row;
        }
        //echo $row;
    } else {
        return null;
    }
    return $staffList;
}

function SaveAppointment($CID,$date,$time,$purpose,$appType,$conn){
    $query = "INSERT INTO appointment(CID,Date,Time,Purpose,APPTYPE) VALUES('$CID','$date','$time','$purpose','$appType')";
    $AID = null;
    if(mysqli_query($conn, $query)){
        // Obtain last inserted id
        $AID = mysqli_insert_id($conn);
        echo "Records inserted successfully. Last inserted ID is: " . $AID."<br>";
    } else{
        echo "ERROR: Could not able to execute $query. " . mysqli_error($conn);
    }

    return $AID;
//    $conn->close();
}

function SaveArrange($AID, $SID, $conn){
    $query = "INSERT INTO arrange(AID,SID) VALUES('$AID','$SID')";
    //Execute the query
    if ($conn->query($query) === TRUE) {
        echo "New record created successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

function getArrangeBySID($SID, $conn){
    $query = "select * from arrange where SID='$SID'";
    $result = $conn->query($query);
    $AID=[];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()){
            $AID[]=$row;
        }
        //echo $row;
    } else {
        return null;
    }
    return $AID;
}

function CheckArrange($AID,$SID, $conn){
    $query = "select * from arrange where SID='$SID' AND AID='$AID'";
    $result = $conn->query($query);
    $AID=[];
    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

function SaveDriverLicence($CID, $DID, $conn){
    $query = "INSERT INTO Driver_Licence(CID,DID) VALUES('$CID','$DID')";
    //Execute the query
    if ($conn->query($query) === TRUE) {
        echo "New record created successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

function getDriverLicencewithCID($CID,$conn){
    $query = "select * from Driver_Licence where CID = '$CID'";
    //Execute the query
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        //echo $row;
    } else {
        return null;
    }
    return $row;
}

function SaveCustomerleasewilling($AID,$conn){
    $query = "INSERT INTO Customers_willing_to_lease(AID) VALUES('$AID')";
    //Execute the query
    if ($conn->query($query) === TRUE) {
        echo "New record created successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

function SaveCustomerbuywilling($AID,$conn){
    $query = "INSERT INTO Customers_willing_to_lease(AID) VALUES('$AID')";
    //Execute the query
    if ($conn->query($query) === TRUE) {
        echo "New record created successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

function SaveCars($Price,$Brand,$CarName,$sellType,$conn){
    $query = "INSERT INTO Cars(Price,Brand,carName,sellType) VALUES('$Price','$Brand','$CarName','$sellType')";
    if ($conn->query($query) === TRUE) {
        echo "New record created successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

function getAllCarwithType($conn,$appType){
    $query = "select * from Cars where sellType = '$appType' AND AID is null;";
    //Execute the query
    $result = $conn->query($query);
    $cars=[];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()){
            $cars[]=$row;
        }
        //echo $row;
    } else {
        return null;
    }
    return $cars;
}

function getCarWithAID($AID,$conn){
    $query = "select * from Cars where AID = '$AID'";
    //Execute the query
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        //echo $row;
    } else {
        return null;
    }
    return $row;
}

function getAllInsurance($conn){
    $query = "select * from Insurance";
    //Execute the query
    $result = $conn->query($query);
    $Insurances=[];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()){
            $Insurances[]=$row;
        }
        //echo $row;
    } else {
        return null;
    }
    return $Insurances;
}

function getInsurancewithAID($AID,$conn){
    $query = "select * from Insurance,AttachInsurance where AID = '$AID'";
    //Execute the query
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        //echo $row;
    } else {
        return null;
    }
    return $row;
}
