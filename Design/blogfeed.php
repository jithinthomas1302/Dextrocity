<?php 

session_start();

if (isset($_SESSION['Name']) && isset($_SESSION['Username'])) 
{
    include('Connect.php');
  $user = $_SESSION['Username'];
  $sql3 = "SELECT * FROM {$_SESSION['table_name']} WHERE username = '{$user}'";
  
  $res = $con->query($sql3);
  
    if ($res->num_rows > 0) 
    {
      while($row = $res->fetch_assoc())
      {
 ?>
<html>
  <head>
  <link rel="stylesheet" href="blogfeed.css" type="text/css">
  <style>
    .vignette {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: auto;
        box-shadow: 0 0 300px #1C0C5B inset;
        z-index: 1;
      }
      #toplogo
      {
        width: 100px;
        height: 100px;
        top:5px;
        left: 50px;
        position: fixed;
      }
      .btn-5 {
    position: fixed;
    width: 120px;
    height: 50px;
    line-height: 42px;
    top: 110px;
    left: 45px;
    padding: 0;
    border: none;
    background: #916BBF;
    background: linear-gradient(40deg, #916BBF 0%, #432e9b 100%);
  }
  .btn-5:hover {
    color: #916BBF;
    background: transparent;
     box-shadow:none;
  }
  .btn-5:before,
  .btn-5:after{
    content:'';
    position:fixed;
    top:0;
    right:0;
    height:2px;
    width:0;
    background: #916BBF;
    box-shadow:
     -1px -1px 5px 0px #fff,
     7px 7px 20px 0px #0003,
     4px 4px 5px 0px #0002;
    transition:400ms ease all;
  }
  .btn-5:after{
    right:inherit;
    top:inherit;
    left: 45px;
    bottom:0;
  }
  .btn-5:hover:before,
  .btn-5:hover:after{
    width:120px;
    transition:800ms ease all;
  }
  
      
      </style>
    <script type = "text/javascript">
      document.querySelectorAll(".projcard-description").forEach(function(box) {
	$clamp(box, {clamp: 6});
});

     </script> 
<script>
function showMorePosts(post_id) {
  window.location.href = 'blog.php?post_id=' + post_id;
}
</script>
  </head>
  <body>
  <div class = "vignette">
    <img id="toplogo" src="https://raw.githubusercontent.com/Prawnsy/Dextrocity-project/main/main/DC.png" >
    <ul class="snip1189">
        <li class="current" onclick=""><a href="blogfeed.php">Blogs</a></li>
        <li><a href="events.php">Events</a></li>
        <li><a href="offers.php">My Bookings</a></li>
        <li><a href="bookings.php">Offer Requests</a></li>
        <li><a href="https://dextrocityind.tawk.help/">FAQs</a></li>
        <li><a href="u_profile.php">My Profile</a></li>
      </ul>
 
<div style="position: absolute; top: 0px;"><img src="<?php echo $row['DP']; ?>" style="position: absolute; width: 35px;height: 35px;left: 1360px;top: 25px; border-radius: 50%;"></div>
<p style=" position: absolute; top: 13px; left: 1405px; font-family: PT Sans; font-size: 16px;  color: white;"><?php echo $row['name']; ?></p>
<a href="logout.php" style=" position: absolute; top: 50px; left: 1430px; font-family: PT Sans; font-size: 15px;  color: white; text-decoration: none;">Log Out</a>
</div></div>
<div style="height: 40px;"></div>

<script type="text/javascript">
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
  var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
  s1.async=true;
  s1.src='https://embed.tawk.to/63e09398c2f1ac1e20319ada/1goik13qm';
  s1.charset='UTF-8';
  s1.setAttribute('crossorigin','*');
  s0.parentNode.insertBefore(s1,s0);
  })();
  </script> 
  <a href="new_event.php"><button class="custom-btn btn-5" ><span>NEW EVENT</span></button></a>  
</body></html>
<?php 
}
include('Connect.php');
$sql3 = "SELECT * from Blogs ORDER BY Blog_ID DESC";
$res = $con->query($sql3);

if ($res->num_rows > 0) 
{
  
  while($row = $res->fetch_assoc())
 {
     ?>
<div class="projcard-container">
		
    <div class="projcard projcard-blue">
      <div class="projcard-innerbox">
      <img class="projcard-img" src="<?php echo  $row["thumbnail_url"] ?>" />
			<div class="projcard-textbox">
				<div class="projcard-title"><?php echo  $row["caption"] ?></div>
				<div class="projcard-subtitle">Posted by: <?php echo  $row["username"] ?></div>
				<div class="projcard-bar"></div>
				<div class="projcard-description"><?php echo  $row["description"] ?></div>
        <button class="custom-btn btn-3" onclick="showMorePosts(<?php echo $row["Blog_ID"] ?> )">Show More</button>
        </div>
      </div>
    </div>
</div>

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