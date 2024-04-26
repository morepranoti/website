<?php
   $Username = $_POST['user'];
   $email = $_POST['email'];
   $mobile = $_POST['mobile'];
   $comments = $_POST['comments']; 

//database connection
$conn = new mysqli('localhost', 'root','', 'UserInfoDB');
if($conn->connect_error){
    die('Connection Failed  :   '. $conn->connect_error);
}else{
    $stmt = $conn->prepare("INSERT INTO `UserData`(`Username`, `Email ID`, `Mobile`, `Comments`)
    VALUES (?, ?, ?, ?) ");
    $stmt->bind_param("ssis", $Username, $email, $mobile, $comments);
    $stmt->execute();
    echo "Submitted Successfully";
    $stmt->close();
    $conn->close();
}

?>