<?php 
session_start();
if (isset($_SESSION['Name']) && isset($_SESSION['Username']) && isset($_SESSION['table_name'])) {
  include('Connect.php');
  $user = $_SESSION['Username'];
  $sql3 = "SELECT * FROM {$_SESSION['table_name']} WHERE username = '{$user}'";
  
  $res = $con->query($sql3);
  
    if ($res->num_rows > 0) 
    {
      while($row = $res->fetch_assoc())
      {
       ?>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <head>
        <link rel="stylesheet" href="./uprof.css">
      
        <script src="https://code.jquery.com/jquery-3.6.0.min.js">

        $(document).ready(function() {
        const maxChars = 50;
        $('figcaption h3').each(function() {
        var text = $(this).text();
        if (text.length > maxChars) {
          $(this).text(text.substr(0, maxChars) + "...");
        }
        });
        });

      </script>
      <script>
function showMorePosts(post_id) {
  window.location.href = 'Eventview.php?post_id=' + post_id;
}

function DeletePosts(post_id) {
  window.location.href = 'EventDelete.php?post_id=' + post_id;
}
</script>
      </head>
      <body>
        <div class="main-content">
    <!-- Top navbar -->
    
        <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
        
          <!-- Form --><ul class="snip1189">
          <li onclick=""><a href="blogfeed.php">Blogs</a></li>
        <li><a href="events.php">Events</a></li>
        <li><a href="offers.php">My Bookings</a></li>
        <li><a href="bookings.php">Offer Requests</a></li>
        <li><a href="https://dextrocityind.tawk.help/">FAQs</a></li>
        <li  class="current" ><a href="u_profile.php">My Profile</a></li>
              </ul>
              
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">
            
          </div>
        </form>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="<?php echo  $row["DP"] ?>">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  
                  <span class="mb-0 text-sm  font-weight-bold"><?php echo  $row['name']?></span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Settings</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span>Activity</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-support-16"></i>
                <span>Support</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#!" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(https://raw.githubusercontent.com/creativetimofficial/argon-dashboard/gh-pages/assets-old/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello <?php echo  $row['name']?></h1>
            <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your blogs here</p>
            <a href="edit_profile.php" class="btn btn-info">Edit profile</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="<?php echo  $row['DP']?>" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
                <a href="#" class="btn btn-sm btn-default float-right">Message</a>
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3>
                <?php echo  $row['name']?>
                </h3>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i><?php echo  $row['city']?>
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i><?php echo  $row['username']?>
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i><?php echo  $row['category']?>
                </div>
                <hr class="my-4">
                <p><?php echo  $row['AboutMe']?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header1 bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Events</h3>
                </div>
                
              </div>
            </div>
            

    <?php
    }
     include('Connect.php');
     $user = $_SESSION['Username'];
     $sql = "SELECT * FROM {$_SESSION['table_name']} JOIN Events WHERE Events.Host = '{$user}' AND {$_SESSION['table_name']}.username = Events.Host";
     
     $result = $con->query($sql);
     
     if ($result->num_rows > 0) 
     {
          
    while($rows = $result->fetch_assoc())
   { ?>
           <div class="projcard-container">
		
    <div class="projcard projcard-blue">
      <div class="projcard-innerbox">
      <img class="projcard-img" src="<?php echo  $rows["Image"] ?>" />
			<div class="projcard-textbox">
				<div class="projcard-title"><?php echo  $rows["Name"] ?></div>
				<div class="projcard-bar"></div>
        <button class="custom-btn btn-3" onclick="showMorePosts(<?php echo $rows['EventID'] ?> )">View</button>
        <button style="margin-top: 10px;"  class="custom-btn btn-3" onclick="DeletePosts(<?php echo $rows['EventID'] ?> )" >Delete</button>
        </div>
      </div>
    </div>
</div>
              <?php
     
  }
} 
else {
  echo("No Events Yet");
}
?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer">
    <div class="row align-items-center justify-content-xl-between">
      <div class="col-xl-6 m-auto text-center">
        <div class="copyright">
          <p>Copyright by Dextrocity</p>
        </div>
      </div>
    </div>
  </footer>
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
</body>
<?php
 }
else
{

     header("Location: ErrorMessage.html");

     exit();

}
}
?>