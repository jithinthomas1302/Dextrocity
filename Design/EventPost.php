<?php

require_once('Connect.php');
require 'vendor/autoload.php';
use Aws\S3\S3Client;
session_start();

if (isset($_SESSION['Name']) && isset($_SESSION['Username'])) 
{




// AWS S3 bucket settings
$bucket = 'dextrocity';
$region = 'us-east-1';
$key = 'AKIAQQGA74AHIER63XPD';
$secret = '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';

// Create an instance of the S3Client
$s3Client = new S3Client([
    'version' => 'latest',
    'region'  => $region,
    'credentials' => [
        'key'    => $key,
        'secret' => $secret,
    ]
]);

// Get the file name and temporary file path of the thumbnail image
$thumbnailName = $_FILES['Image']['name'];
$thumbnailTmpName = $_FILES['Image']['tmp_name'];

// Upload the thumbnail image to S3 bucket
$result = $s3Client->putObject([
    'Bucket' => $bucket,
    'Key' => 'Event/' . $thumbnailName,
    'Body' => fopen($thumbnailTmpName, 'r'),
    'ACL' => 'public-read',
]);

// Get the URL of the uploaded files
$thumbnailUrl = $result['ObjectURL'];


// Get the title and description from the form
$name = $_POST['Name'];
$description = $_POST['Description'];
$location = $_POST['Location'];
$amount = $_POST['Amount'];
$title = $_POST['Name'];
$duration = $_POST['Duration'];
$date = $_POST['Date'];

// Insert the blog post into the database
$user = $_SESSION['Username'];
$sql = "INSERT INTO Events (Host, Name, Location,Date,Amount,Image,Duration,Description) VALUES ('$user', '$name', '$location', '$date', '$amount','$thumbnailUrl','$duration','$description')";
$result = mysqli_query($con, $sql);

if ($result) {
    header("Location: events.php");

} else {
    header("Location: ErrorMessage.html");
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
