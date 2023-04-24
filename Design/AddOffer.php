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

    $offer = validate($_POST['offer']);
    $user = $_SESSION['Username'];
    $eventid = validate($_POST['EventID']);
    $insert_user = mysqli_query($con, "INSERT INTO AppliedArtists (username,EventID,Offer) VALUES ('$user','$eventid', '$offer')");

    if($insert_user) {
        
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
