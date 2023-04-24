<?php 
session_start();

include('Connect.php');

if (isset($_SESSION['Name']) && isset($_SESSION['Username']) &&isset($_GET['post_id'])) {

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $blogid = validate($_GET['post_id']);
    $insert_user = mysqli_query($con, "DELETE from Blogs where Blog_ID = '$blogid'");

    if($insert_user) {
        $_SESSION['success'] = "Blog Deleted successfully";
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
