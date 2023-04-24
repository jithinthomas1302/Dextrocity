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
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<head>
    <link rel="stylesheet" href="./nbp.css">
</head>
<body>
  <div class="main-content">
    <!-- Top navbar -->
    
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        
        <!-- Form --><ul class="snip1189">
              <li class="current" onclick=""><a href="#">Blogs</a></li>
              <li><a href="Artist_events.php">Events</a></li>
              <li><a href="#">Bookings</a></li>
              <li><a href="https://dextrocityind.tawk.help/">FAQs</a></li>
              <li ><a href="Artist_profile.php">My Profile</a></li>
            </ul>
            
      
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src= "<?php echo  $row["DP"] ?> ">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  
                  <span class="mb-0 text-sm  font-weight-bold"><?php echo  $row["name"] ?></span>
                  
                </div>
              </div>
            </a>
           
          </li>
        </ul>
      </div>
      <a href="logout.php" style=" position: absolute; top: 55px; left: 1420px; font-family: PT Sans; font-size: 15px;  color: white; text-decoration: none;">Log Out</a>
    </nav>
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(https://raw.githubusercontent.com/creativetimofficial/argon-dashboard/gh-pages/assets-old/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Create New Blog</h1>
            <p>Share your skills to the world by making a new blog</p>
            
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
       
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Please enter the details</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
            <form action="BlogPost.php" method="POST" enctype="multipart/form-data">
  <div class="pl-lg-4">
    <div class="row">
      <div class="col-lg-6">
        <div class="form-group focused">
          <label class="form-control-label" for="title">Title</label>
          <input type="text" name="title" id="title" class="form-control form-control-alternative" placeholder="">
        </div>
      </div>
    </div>
                  
    <hr class="my-4">
                  
    <div class="pl-lg-4">
      <div class="row">
        <div class="col-lg-4">
          <div class="form-group focused">
            <label class="form-control-label" for="thumbnail">Thumbnail (Image Only)</label>
            <input type="file" name="thumbnail" id="thumbnail" class="form-control form-control-alternative" accept="image/*" placeholder="">
          </div>
        </div>
      </div>
                  
      <div class="row">
        <div class="col-lg-4">
          <div class="form-group focused">
            <label class="form-control-label" for="imagevideo">Image/Video (Image or Video)</label>
            <input type="file" name="imagevideo" id="imagevideo" class="form-control form-control-alternative" accept="image/*, video/*" placeholder="">
          </div>
        </div>
      </div>
    </div>
                  
    <hr class="my-4">
                  
    <div class="pl-lg-4">
      <div class="form-group focused">
        <label>Description</label>
        <textarea rows="4" class="form-control form-control-alternative" name="description" placeholder="Write the body of your blog here"></textarea>
      </div>
    </div>
                  
    <button class="btn btn-info" type="submit" >Post</button>
  </div>
</form>

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
</body>
<?php 
      }
}
else{

     header("Location: loginpg.php");

     exit();

}
}
?>