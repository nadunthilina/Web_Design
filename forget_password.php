<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $usermail = $_POST['Usermail'];
    $securityQuestion = $_POST['security_question'];
    $securityAnswer = $_POST['security_answer'];
    $newPassword = $_POST['new_password'];

   
    $dbHost = 'your_db_host';
    $dbUser = 'your_db_user';
    $dbPassword = 'your_db_password';
    $dbName = 'your_db_name';

    $conn = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    
    $updateQuery = "UPDATE users SET password = '" . password_hash($newPassword, PASSWORD_DEFAULT) . "' WHERE usermail = '$usermail' AND security_question = '$securityQuestion' AND security_answer = '$securityAnswer'";

    if (mysqli_query($conn, $updateQuery)) {
        echo "Password updated successfully.";
       
    } else {
        echo "Error updating password: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
