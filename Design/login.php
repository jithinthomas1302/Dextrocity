<?php
session_start();

include('Connect.php');
$secret_key = "af2b44bc63c81cc4662fb4c2f65e46a7";

// function to decrypt a password
function decrypt_password($encrypted_password, $secret_key) {
    $ciphering = "AES-128-CTR";
    $options = 0;
    list($encrypted_password, $iv) = explode("::", base64_decode($encrypted_password), 2);
    $decryption = openssl_decrypt($encrypted_password, $ciphering, $secret_key, $options, $iv);
    return $decryption;
}

if (isset($_POST['username']) && isset($_POST['password'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['username']);
    $pass = validate($_POST['password']);

    if (empty($uname)) {
        header("Location: loginpg.php?error1=User Name is required");
        exit();
    } else if (empty($pass)) {
        header("Location: loginpg.php?error1=Password is required");
        exit();
    } else {
        $sql_artist = "SELECT * FROM New_Artists WHERE username = '$uname'";
        $result_artist = mysqli_query($con, $sql_artist);

        $is_artist = false;
        $table_name = "";

        if (mysqli_num_rows($result_artist)) {
            $is_artist = true;
            $table_name = "New_Artists";
        } else {
            $sql_customer = "SELECT * FROM New_Customers WHERE username = '$uname'";
            $result_customer = mysqli_query($con, $sql_customer);

            if (mysqli_num_rows($result_customer)) {
                $table_name = "New_Customers";
            } else {
                header("Location: loginpg.php?error1=User does not exist");
                exit();
            }
        }

        $row = mysqli_fetch_assoc($is_artist ? $result_artist : $result_customer);

        $decrypted_password = decrypt_password($row['PasswordHash'], $secret_key);
        if ($decrypted_password === $pass) {
            echo "Logged in!";
            $_SESSION['Username'] = $row['username'];
            $_SESSION['Name'] = $row['name'];
            $_SESSION['Email'] = $row['email'];
            $_SESSION['DP'] = $row['DP'];
            $_SESSION['City'] = $row['city'];
            $_SESSION['AboutMe'] = $row['AboutMe'];
            $_SESSION['table_name'] = $table_name;
        
            // check if this is the first login and update the FirstLogin column accordingly
            $first_login = $row['FirstLogin'];
            if ($first_login == 1) {
                $sql_update_first_login = "UPDATE $table_name SET FirstLogin = 0 WHERE username = '$uname'";
                mysqli_query($con, $sql_update_first_login);
                header("Location: edit_profile.php");
            } else {
                // Redirect to the appropriate page based on the user type
                if ($table_name == "New_Artists") {
                    header("Location: Artist_blogfeed.php");
                } else {
                    header("Location: blogfeed.php");
                }
            }
            exit();
        } else {
            header("Location: loginpg.php?error1=Incorrect username or password");
            exit();
        }
    }
}