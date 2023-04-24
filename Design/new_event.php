<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
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
<head>
    <link rel="stylesheet" href="./nep.css">
</head>
<body>
 <script>
  document.addEventListener('DOMContentLoaded', function() {
    const numberInputs = document.querySelectorAll('input[type="number"]');
    const dateInputs = document.querySelectorAll('input[type="date"]');

    numberInputs.forEach(input => {
      input.addEventListener('input', function() {
        if (this.value < 0) {
          this.value = 0;
        }
      });
    });

    const today = new Date().toISOString().split('T')[0];
    dateInputs.forEach(input => {
      input.setAttribute('min', today);
      input.addEventListener('change', function() {
        if (this.value < today) {
          this.value = today;
        }
      });
    });
  });
</script>



  <div class="main-content">
    <!-- Top navbar -->
    
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        
        <!-- Form --><ul class="snip1189">
              <li><a href="blogfeed.php">Blogs</a></li>
              <li class="current" onclick=""><a href="events.php">Events</a></li>
              <li><a href="#">Bookings</a></li>
              <li><a href="https://dextrocityind.tawk.help/">FAQs</a></li>
              <li ><a href="u_profile.php">My Profile</a></li>
            </ul>
            
      
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="<?php echo $row['DP']?>">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  
                  <span class="mb-0 text-sm  font-weight-bold"><?php echo $row['name']?></span>
                  
                </div>
              </div>
            </a>
           
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
            <h1 class="display-2 text-white">New Event</h1>
            <p>To post an event that your hosting, please fill in the details below for the artists to see.</p>
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
              <form action="EventPost.php" method="POST" enctype="multipart/form-data" >
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Event Name</label>
                        <input type="text" name="Name" id="input-username" class="form-control form-control-alternative" placeholder="">
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-first-name">Location</label>
                        <input type="text" name="Location"id="input-first-name" class="form-control form-control-alternative" placeholder="Location of the Event">
                      </div>
                    </div>

                  </div>
                </div>
                <hr class="my-4">
                <div class="pl-lg-4">
                 
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-city">Starting Amount</label>
                        <input type="number" name = "Amount" id="input-city" class="form-control form-control-alternative" placeholder="Amount you want to pay">
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-city">Image</label>
                        <input type="file" name="Image" id="input-city" class="form-control form-control-alternative" placeholder="">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-city">Duration(hour(s))</label>
                        <input type="number" name = "Duration"id="input-city" class="form-control form-control-alternative" placeholder="Event duration">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-city">Date</label>
                        <input type="date" name= "Date"id="input-city" class="form-control form-control-alternative" placeholder="">
                      </div>
                    </div>
                  </div>

                </div>
                <hr class="my-4">
                <div class="pl-lg-4">
                  <div class="form-group focused">
                    <label>Description</label>
                    <textarea rows="4" name="Description" class="form-control form-control-alternative" placeholder="Describe your event"></textarea>
                  </div>
                </div>
                <button href="#!" class="btn btn-info" style=" margin-left: 20px;">Post</button>
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

     header("Location: ErrorMessage.html");

     exit();

}
}
?>