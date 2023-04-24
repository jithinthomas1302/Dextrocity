<?php
session_start();
require_once('Connect.php');
if (isset($_SESSION['Name']) && isset($_SESSION['Username'])) 
{
// Get the title and description from the form
$artist = $_POST['Artist'];
$description = $_POST['Description'];
$location = $_POST['Location'];
$amount = $_POST['Amount'];
$title = $_POST['EventName'];
$duration = $_POST['Duration'];
$date = $_POST['Date'];
$Customer = $_SESSION['Username'];
$sql = "INSERT INTO Bookings (Customer,Artist,EventName,Location,Amount,Duration,Date,Description) VALUES ('$Customer', '$artist', '$title','$location', '$amount','$duration','$date','$description')";
$result = mysqli_query($con, $sql);

if ($result) {
    header("Location: blogfeed.php");


} else {
    // header("Location: ErrorMessage.html");
    echo "Error creating blog post: " . mysqli_error($con);
}

mysqli_close($con);
}
else
{

    header("Location: loginpg.php");

    exit();

}
?>
