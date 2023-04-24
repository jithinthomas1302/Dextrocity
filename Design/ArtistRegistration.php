<?php 
session_start();

include('Connect.php');

if(isset($_POST['register'])) {

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validate($_POST['username']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $user_type = $_POST['user_type']; // added user_type variable

    $secret_key = "af2b44bc63c81cc4662fb4c2f65e46a7";

    // function to encrypt a password
    function encrypt_password($password, $secret_key) 
    {
        $ciphering = "AES-128-CTR";
        $options = 0;
        $iv_length = openssl_cipher_iv_length($ciphering);
        $iv = openssl_random_pseudo_bytes($iv_length);
        $encryption = openssl_encrypt($password, $ciphering, $secret_key, $options, $iv);
        return base64_encode($encryption . "::" . $iv);
    }

    $encrypted_password = encrypt_password($password, $secret_key);

    // check user type and set table name accordingly
    if($user_type == "artist") {
        $table_name = "New_Artists";
    } else if($user_type == "customer") {
        $table_name = "New_Customers";
    } else {
        // handle error, invalid user type
        header("Location: loginpg.php?error=Invalid user type");
        exit();
    }

    $check_username = mysqli_query($con, "SELECT * FROM $table_name WHERE username='$username'");
    $check_email = mysqli_query($con, "SELECT * FROM $table_name WHERE email='$email'");

    if(mysqli_num_rows($check_username) > 0) {
        header("Location: loginpg.php?error=Username already exists");
        exit();
    } else if(mysqli_num_rows($check_email) > 0) {
        header("Location: loginpg.php?error=Email already exists");
        exit();
    } else {
        // Insert new user into database
        $insert_user = mysqli_query($con, "INSERT INTO $table_name (username, email, PasswordHash) VALUES ('$username', '$email', '$encrypted_password')");

        if($insert_user) {
            $_SESSION['success'] = "Registration successful! You can now log in.";
            header("Location: loginpg.php");
            exit();
        } else {
            header("Location:ErrorMessage.html");
            exit();
        }
    }

} else {
    header("Location: loginpg.php");
    exit();
}
