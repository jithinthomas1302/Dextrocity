<?php 
session_start();

include('Connect.php');

if (isset($_SESSION['Name']) && isset($_SESSION['Username']) &&isset($_GET['Status'])) {

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $status = validate($_GET['Status']);
 
    $insert_user = mysqli_query($con, "UPDATE AppliedArtists set Status='Rejected' WHERE OfferID = '$status'");

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
