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
  <link rel="stylesheet" href="Bookings.css" type="text/css">
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
    z-index: 9999;
    width: 100px;
    height: 40px;
    line-height: 42px;
    top: 148px;
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
    top: 150px;
    left: 45px;
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
    top: 50px;
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
<!-- JavaScript function to redirect to next page with POST_ID as parameter -->
<script>
function OfferResponse(post_id) {
  window.location.href = 'AcceptBooking.php?Status=' + post_id ;
}

function RejectOffer(post_id) {
  window.location.href = 'RejectBooking.php?Status=' + post_id ;
}
</script>
  </head>
  <body>
  <div class = "vignette">
    <img id="toplogo" src="https://raw.githubusercontent.com/Prawnsy/Dextrocity-project/main/main/DC.png" >
    <ul class="snip1189">
    <li  onclick=""><a href="blogfeed.php">Blogs</a></li>
        <li><a href="events.php">Events</a></li>
        <li ><a href="offers.php">My Bookings</a></li>
        <li class="current"><a href="bookings.php">Offer Requests</a></li>
        <li><a href="https://dextrocityind.tawk.help/">FAQs</a></li>
        <li><a href="u_profile.php">My Profile</a></li>
      </ul>
 
<div style="position: absolute; top: 0px;"><img src="<?php echo $row['DP']; ?>" style="position: absolute; width: 35px;height: 35px;left: 1360px;top: 25px; border-radius: 50%;"></div>
<p style=" position: absolute; top: 13px; left: 1405px; font-family: PT Sans; font-size: 16px;  color: white;"><?php echo $row['name']; ?></p>
<a href="logout.php" style=" position: absolute; top: 50px; left: 1430px; font-family: PT Sans; font-size: 15px;  color: white; text-decoration: none;">Log Out</a>
</div></div>
<div style="height: 60px;"></div>

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
</body></html>
<?php 
}
include('Connect.php');
$user = $_SESSION['Username'];
$sql3 = "SELECT * FROM AppliedArtists JOIN Events on AppliedArtists.EventID = Events.EventID where Events.Host = '$user'";
$res = $con->query($sql3);

if ($res->num_rows > 0) 
{
  
  while($row = $res->fetch_assoc())
 {
  if($row['Status'] == 'Accepted')
  {
     ?>
<div class="projcard-container">
		
    <div class="projcard projcard-blue">
      <div class="projcard-innerbox">
			<div class="projcard-textbox">
				<div class="projcard-title">Event: <?php echo  $row["Name"] ?></div>
				<div class="projcard-subtitle">Hosted by: <?php echo  $row["Host"] ?></div>
				<div class="projcard-bar"></div>
				<div class="projcard-description">Offer Amount: <?php echo  $row["Offer"]?> <br>Status:<a style="color: green; font-weight:bold;"> <?php echo  $row["Status"]?> </a></div>
        </div>
      </div>
    </div>
</div>

<?php
  }
else if($row['Status'] == 'Pending')
{
  ?>
<div class="projcard-container">
		
    <div class="projcard projcard-blue">
      <div class="projcard-innerbox">
			<div class="projcard-textbox">
				<div class="projcard-title">Event: <?php echo  $row["Name"] ?></div>
				<div class="projcard-subtitle">Offer by: <?php echo  $row["username"] ?></div>
				<div class="projcard-bar"></div>
				<div class="projcard-description">Offer Amount: <?php echo  $row["Offer"]?></div>
        <button class="custom-btn btn-3" style="margin-top: -40px; position: absolute; left: 100px;" onclick="OfferResponse(<?php echo $row['OfferID'] ?>)" >Accept</button>
        <button class="custom-btn btn-3" style="margin-top: -40px; position: absolute; left: 230px;z-index: 9999;" onclick="RejectOffer(<?php echo $row['OfferID'] ?>)" >Decline</button>
        </div>
      </div>
    </div>
</div>
<?php
}
else
{
  echo '<h2 style="color:white; margin-top:100px; margin-left: 620px;">No pending bookings at the moment!</h2>'; 
}
} 
}
else {
  echo '<h2 style="color:white; margin-top:100px; margin-left: 620px;">No Bookings have been made</h2>';
}

}
}
else
{

    header("Location: loginpg.php");

    exit();

}
 ?>