<!DOCTYPE html>
<?php
session_start();

if (isset($_SESSION['Name']) && isset($_SESSION['Username']) && isset($_GET['post_id'])) 
{
    include('Connect.php');
    $post_id = $_GET['post_id'];
    $user = $_SESSION['Username'];
  $sql3 = "SELECT * FROM {$_SESSION['table_name']} WHERE username = '{$user}'";
  
    $res = $con->query($sql3);
    
      if ($res->num_rows > 0) 
      {
        while($row = $res->fetch_assoc())
        {
  ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Post</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="event-p.css">
    <script>
function goBack() {
  window.history.go(-1);
}
</script>
<style>
        #media-container {
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>
    <header>
        <div class="menu-bar">
            <nav>
                <ul class="snip1189">
                    
                    <li ><a href="blogfeed.php">Blogs</a></li>
                    <li class="current" onclick="goBack()"><a href="#">Events</a></li>
                    <li><a href="#">Bookings</a></li>
                    <li><a href="https://dextrocityind.tawk.help/">FAQs</a></li>
                    <li><a href="u_profile.php">My Profile</a></li>
                  </ul>
            </nav>
            
        </div>
        <div class="user">
            <img src="<?php echo $row['DP'] ?>" alt="User Image" class="user-image">
            <a href="#" class="username"><?php echo $row['name'] ?> </a>
          </div>
    </header>
   <?php
        }
include('Connect.php');
$sql3 = "SELECT * FROM Events b JOIN New_Customers na ON b.Host = na.username WHERE b.EventID = '{$post_id}'";
$res = $con->query($sql3);

if ($res->num_rows > 0) 
{
  
  while($row = $res->fetch_assoc())
 {
     ?>
   
  <main>
    <div class="event-container">
        <div class="e-title">
            <h1><?php echo $row['Name']?></h1>     
            <div class="post-details">
                <span class="post-date">Event Date: <?php echo $row['Date']?> </span>
                <img src="<?php echo $row['DP']?>" alt="User Image" class="poster-image">
                <a href="#" class="poster-name"><?php echo $row['username']?></a>
            </div>   
        </div>
            <img src="<?php echo $row['Image']?>" alt="Event-image" class="event-image">
            <p class="info"><?php echo $row['Description']?></p>
        <div class="e-disc">
            <p>Location: <?php echo $row['Location']?></p>
            <p>Starting Fees: <?php echo $row['Amount']?></p>
        </div>
      
    </div>
  </main>

    <footer>
        <p>Copyright by Dextrocity</p>
    </footer>
</body>
</html>
<?php
}
} 
else {
echo "No Blogs have been made";
}

}
}
else
{

  header("Location: loginpg.php");

  exit();

}
?>