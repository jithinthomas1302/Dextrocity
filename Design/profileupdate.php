<?php
session_start();
require 'vendor/autoload.php';
use Aws\S3\S3Client;
include('Connect.php');

if(isset($_POST['update'])) {

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    
    $name = validate($_POST['name']);
    $phone_no = validate($_POST['phone_no']);
    $city = validate($_POST['city']);
    $category = validate($_POST['Category']);
    $AboutMe =  mysqli_real_escape_string($con,nl2br($_POST['AboutMe']));
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

    // Get the file name and temporary file path of the original image
    $fileName = $_FILES['imageUpload']['name'];
    $fileTmpName = $_FILES['imageUpload']['tmp_name'];

    // Load the original image using GD library
    $image = imagecreatefromstring(file_get_contents($fileTmpName));

    // Get the dimensions of the original image
    $width = imagesx($image);
    $height = imagesy($image);

    // Calculate the size of the square crop
    $cropSize = min($width, $height);

    // Create a new square image with the calculated size
    $croppedImage = imagecreatetruecolor($cropSize, $cropSize);

    // Crop the original image to the center of the new square image
    imagecopyresampled($croppedImage, $image, 0, 0, ($width-$cropSize)/2, ($height-$cropSize)/2, $cropSize, $cropSize, $cropSize, $cropSize);

    // Generate a unique file name for the cropped image
    $croppedFileName = uniqid('DP_') . '.jpg';

    // Save the cropped image to a temporary file
    imagejpeg($croppedImage, $croppedFileName, 90);

    // Upload the cropped image to S3 bucket
    $result = $s3Client->putObject([
        'Bucket' => $bucket,
        'Key' => 'DPs/' . $croppedFileName,
        'Body' => fopen($croppedFileName, 'r'),
        'ACL' => 'public-read',
    ]);

    // Get the URL of the uploaded image
    $DPUrl = $result['ObjectURL'];

    // Update the user profile with the new information
    $user = $_SESSION['Username'];
    $insert_user = mysqli_query($con, "UPDATE {$_SESSION['table_name']} SET name = '$name', phone_no = '$phone_no', city='$city',category='$category', DP='$DPUrl', AboutMe = '$AboutMe' WHERE username = '$user'");

    if($insert_user) {
        if ($_SESSION['table_name'] == 'New_Artists') {
            $_SESSION['success'] = "Profile update successful! You can now continue using our services";
            header("Location: Artist_profile.php");
            exit();
        } else {
            $_SESSION['success'] = "Profile update successful! You can now continue using our services";
            header("Location: u_profile.php");
            exit();
        }
    }
        else {
        echo "Error: " . mysqli_error($con);
        exit();
    }

} else {
    header("Location: loginpg.php");
    exit();
}

// Free
