<?php 
session_start();

include('Connect.php');

if (isset($_SESSION['Name']) && isset($_SESSION['Username'])) {

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $comment = validate($_POST['comment']);
    $user = $_SESSION['Username'];
    $blogid = validate($_POST['post_id']);
    $insert_user = mysqli_query($con, "INSERT INTO Comments (username,PostID,Comment) VALUES ('$user','$blogid', '$comment')");

    if($insert_user) {
        $_SESSION['success'] = "Comment added successfully";
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
        // header("Location:ErrorMessage.html");
        exit();
    }
}

else {
    echo("Did not get Post ID");
    exit();
}
