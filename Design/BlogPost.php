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
$thumbnailName = $_FILES['thumbnail']['name'];
$thumbnailTmpName = $_FILES['thumbnail']['tmp_name'];

// Upload the thumbnail image to S3 bucket
$result = $s3Client->putObject([
    'Bucket' => $bucket,
    'Key' => 'thumbnails/' . $thumbnailName,
    'Body' => fopen($thumbnailTmpName, 'r'),
    'ACL' => 'public-read',
]);

// Get the file name and temporary file path of the image or video
$fileType = $_FILES['imagevideo']['type'];
$extension = explode('/', $fileType)[1]; // Get the file extension
$fileName = $_FILES['imagevideo']['name'];
$fileTmpName = $_FILES['imagevideo']['tmp_name'];

// Upload the image or video to S3 bucket
$result1 = $s3Client->putObject([
    'Bucket' => $bucket,
    'Key' => 'imagevideo/' . $fileName,
    'Body' => fopen($fileTmpName, 'r'),
    'ContentType' => $fileType,
    'ACL' => 'public-read',
]);

// Get the URL of the uploaded files
$thumbnailUrl = $result['ObjectURL'];
$fileUrl = $result1['ObjectURL'];

// Get the title and description from the form
$title = $_POST['title'];
$description = $_POST['description'];

// Insert the blog post into the database
$user = $_SESSION['Username'];
$sql = "INSERT INTO Blogs (username, caption, description, thumbnail_url, media_url) VALUES ('$user', '$title', '$description', '$thumbnailUrl', '$fileUrl')";
$result = mysqli_query($con, $sql);

if ($result) {
    header("Location: Artist_blogfeed.php");

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
