<?php 
session_start();
if (isset($_SESSION['Name']) && isset($_SESSION['Username']) && isset($_SESSION['table_name'])) {
  include('Connect.php');
  $user = $_SESSION['Username'];
  $sql3 = "SELECT * from {$_SESSION['table_name']} where username= '$user'";
  $res = $con->query($sql3);
  
  if ($res->num_rows > 0) 
  {
    
    while($row = $res->fetch_assoc())
   {
       ?>

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<head>
    <link rel="stylesheet" href="./edprof.css">
    <!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- jQuery UI library -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<title>Profile Creation</title>
<script>
$(document).ready(function() {
  // Define the list of cities
  var cities = [  "Mumbai",  "Delhi",  "Bangalore",  "Hyderabad",  "Ahmedabad",  "Chennai",  "Kolkata",  "Surat",  "Pune",  "Jaipur",  "Lucknow",  "Kanpur",  "Nagpur",  "Visakhapatnam",  "Bhopal",  "Patna",  "Ludhiana",  "Agra",  "Nashik",  "Vadodara",  "Gorakhpur",  "Rajkot",  "Meerut",  "Kalyan-Dombivali",  "Varanasi",  "Srinagar",  "Aurangabad",  "Dhanbad",  "Amritsar",  "Navi Mumbai",  "Allahabad",  "Ranchi",  "Howrah",  "Jabalpur",  "Gwalior",  "Vijayawada",  "Jodhpur",  "Madurai",  "Raipur",  "Kota",  "Guwahati",  "Chandigarh",  "Solapur",  "Hubballi-Dharwad",  "Bareilly",  "Moradabad",  "Mysore",  "Gurgaon",  "Aligarh",  "Jalandhar",  "Tiruchirappalli",  "Bhubaneswar",  "Salem",  "Mira-Bhayandar",  "Warangal",  "Thiruvananthapuram",  "Bhiwandi",  "Saharanpur",  "Gorakhpur",  "Guntur",  "Bikaner",  "Amravati",  "Noida",  "Jamshedpur",  "Bhilai",  "Cuttack",  "Firozabad",  "Kochi",  "Nellore",  "Bhavnagar",  "Dehradun",  "Durgapur",  "Asansol",  "Rourkela",  "Nanded",  "Kolhapur",  "Ajmer",  "Akola",  "Gulbarga",  "Jamnagar",  "Ujjain",  "Loni",  "Siliguri",  "Jhansi",  "Ulhasnagar",  "Jammu",  "Sangli-Miraj & Kupwad",  "Mangalore",  "Erode",  "Belgaum",  "Ambattur",  "Tirunelveli",  "Malegaon",  "Gaya",  "Jalgaon",  "Udaipur",  "Maheshtala",  "Davanagere",  "Kozhikode",  "Kurnool"]


  // Attach the autocomplete feature to the textbox
  $("#Category").autocomplete({
    source: cities
  });
});

</script>
<style>
	#imagePreview {
			width: 200px;
			height: 200px;
			background-position: center center;
			background-size: cover;
			margin: 0 auto;
			border-radius: 50%;
			overflow: hidden;
		}
		input[type="file"] {
			display: none;
		}
		.label1 {
			cursor: pointer;
			display: block;
			width: 200px;
			height: 40px;
      margin-right: 300px;
      margin-top: 75px;
			background-color: #3498db;
			color: #fff;
			text-align: center;
			line-height: 40px;
			border-radius: 4px;
		}
</style>
</head>
<body>
<img id="toplogo" src="https://raw.githubusercontent.com/Prawnsy/Dextrocity-project/main/main/DC.png" >
  <div class="main-content">
    <!-- Top navbar -->
    
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
      
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
           
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
            <h1 class="display-2 text-white">Hello <?php echo  $_SESSION["Username"] ?></h1>
            <p class="text-white mt-0 mb-5">Welcome to Dextrocity! Please update your details before you begin to use our services. Thank you! </p>
            
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-body">
            <form action="profileupdate.php" method="post" enctype="multipart/form-data">
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                <div class="row">
                <div id="imagePreview" style="background-image: url('<?php echo  $row["DP"] ?>');"></div>
	              <label class="label1"for="imageUpload">Upload Profile Picture</label>
	              <input type="file" name= "imageUpload"id="imageUpload" accept=".jpg, .jpeg, .png">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script>
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					var image = new Image();
					image.src = e.target.result;
					image.onload = function() {
						// Create a new HTML5 Canvas element to store the cropped image
						var canvas = document.createElement('canvas');
						var context = canvas.getContext('2d');

						// Calculate the square dimensions
						var squareSize = Math.min(this.width, this.height);
						var offsetX = (this.width - squareSize) / 2;
						var offsetY = (this.height - squareSize) / 2;

						// Draw the cropped image to the canvas
						canvas.width = squareSize;
						canvas.height = squareSize;
						context.drawImage(this, offsetX, offsetY, squareSize, squareSize, 0, 0, squareSize, squareSize);

						// Update the image preview
						$('#imagePreview').css('background-image', 'url('+canvas.toDataURL()+')');
						$('#imagePreview').hide();
						$('#imagePreview').fadeIn(650);
						
						// Initialize Cropper.js with the cropped image
						$('#imagePreview').cropper({
							viewMode: 1,
							autoCropArea: 1,
							aspectRatio: 1/1,
							strict: true,
							background: false,
							guides: false,
							highlight: false,
							dragCrop: false,
							cropBoxMovable: false,
							cropBoxResizable: false
						});
					};
				}
				reader.readAsDataURL(input.files[0]);
			}
		}
		$("#imageUpload").change(function() {
			readURL(this);
		});
	</script>
                </div>
               
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="name">Full name</label>
                        <input type="text" name = "name"id="name" class="form-control form-control-alternative" value="<?php echo  $row["name"] ?>"placeholder="<?php echo  $row["name"] ?>">
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                   
                   <div class="col-lg-6">
                     <div class="form-group">
                       <label class="form-control-label" for="phone_no">Phone no.</label>
                       <input type="text" name="phone_no" id="phone_no" class="form-control form-control-alternative" value="<?php echo  $row["phone_no"] ?>"placeholder="<?php echo  $row["phone_no"] ?>">
                     </div>
                   </div>
                 </div>
                </div>
                <hr class="my-4">
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="email">Email Address</label>
                        <input id="email" name="email" class="form-control form-control-alternative" value="<?php echo  $row["email"] ?>" placeholder="<?php echo  $row["email"] ?>" type="text" DISABLED>
                      </div>
                    </div>
                  </div>
                  <script>
  $(document).ready(function() {
  // Define the list of cities
  var cities = [  "Mumbai",  "Delhi",  "Bangalore",  "Hyderabad",  "Ahmedabad",  "Chennai",  "Kolkata",  "Surat",  "Pune",  "Jaipur",  "Lucknow",  "Kanpur",  "Nagpur",  "Visakhapatnam",  "Bhopal",  "Patna",  "Ludhiana",  "Agra",  "Nashik",  "Vadodara",  "Gorakhpur",  "Rajkot",  "Meerut",  "Kalyan-Dombivali",  "Varanasi",  "Srinagar",  "Aurangabad",  "Dhanbad",  "Amritsar",  "Navi Mumbai",  "Allahabad",  "Ranchi",  "Howrah",  "Jabalpur",  "Gwalior",  "Vijayawada",  "Jodhpur",  "Madurai",  "Raipur",  "Kota",  "Guwahati",  "Chandigarh",  "Solapur",  "Hubballi-Dharwad",  "Bareilly",  "Moradabad",  "Mysore",  "Gurgaon",  "Aligarh",  "Jalandhar",  "Tiruchirappalli",  "Bhubaneswar",  "Salem",  "Mira-Bhayandar",  "Warangal",  "Thiruvananthapuram",  "Bhiwandi",  "Saharanpur",  "Gorakhpur",  "Guntur",  "Bikaner",  "Amravati",  "Noida",  "Jamshedpur",  "Bhilai",  "Cuttack",  "Firozabad",  "Kochi",  "Nellore",  "Bhavnagar",  "Dehradun",  "Durgapur",  "Asansol",  "Rourkela",  "Nanded",  "Kolhapur",  "Ajmer",  "Akola",  "Gulbarga",  "Jamnagar",  "Ujjain",  "Loni",  "Siliguri",  "Jhansi",  "Ulhasnagar",  "Jammu",  "Sangli-Miraj & Kupwad",  "Mangalore",  "Erode",  "Belgaum",  "Ambattur",  "Tirunelveli",  "Malegaon",  "Gaya",  "Jalgaon",  "Udaipur",  "Maheshtala",  "Davanagere",  "Kozhikode",  "Kurnool"]


  // Attach the autocomplete feature to the textbox
  $("#city").autocomplete({
    source: cities
  });
});

</script>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="city">City</label>
                        <input type="text" id="city" name="city"  class="form-control form-control-alternative" value="<?php echo  $row["city"] ?>" placeholder="<?php echo  $row["city"] ?>">
                      </div>
                    </div>
                   
                  </div>
                <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="Category">Category</label>
                        <input type="text" name="Category" id="Category" class="form-control form-control-alternative" value="<?php echo  $row["category"] ?>" placeholder="<?php echo  $row["city"] ?>">
                      </div>
                    </div>
                   
                  </div>
                </div>
                <hr class="my-4">
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">About me</h6>
                <div class="pl-lg-4">
                  <div class="form-group focused">
                    <label>About Me</label>
                    <textarea name="AboutMe" id = "AboutMe" rows="4" class="form-control form-control-alternative" placeholder="A few words about you ..."><?php echo  $row["AboutMe"] ?></textarea>
                  </div>
                  <button type="submit" name="update" class="btn btn-info">Save</button>
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
else {
  header("Location: ErrorMessage.html");
}
 }
else
{

     header("Location: ErrorMessage.html");

     exit();

}
?>
