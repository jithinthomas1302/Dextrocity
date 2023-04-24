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
    <link rel="stylesheet" href="b-article.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">

    <script>
function goBack() {
  window.history.go(-1);
}
</script>
<script>
function ViewProfile(username) {
  window.location.href = 'ProfileView.php?username=' + username;
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
                    
                    <li class="current" onclick="goBack()"><a href="#">Blogs</a></li>
                    <li><a href="Artist_events.php">Events</a></li>
                    <li><a href="Artist_offers.php">My Offers</a></li>
                    <li><a href="Artist_bookings.php">Booking Requests</a></li>
                     <li><a href="https://dextrocityind.tawk.help/">FAQs</a></li>
                    <li><a href="Artist_profile.php">My Profile</a></li>
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
$sql3 = "SELECT * FROM Blogs b JOIN New_Artists na ON b.username = na.username WHERE b.Blog_ID = '{$post_id}'";
$res = $con->query($sql3);

if ($res->num_rows > 0) 
{
  
  while($row = $res->fetch_assoc())
 {
     ?>
    <main>
        <article>
            <div class="title-box">
                <h1><?php echo $row['caption'] ?></h1>
            </div>
            <div class="post-info">
                <p class="date">Posted on April 4, 2023 | <img src="<?php echo $row['DP']?>" alt="Author Image" class="author-image"><a  onclick=" ViewProfile('<?php echo $row['username']; ?>' )" class="author-name"><?php echo $row['name']?></a></p>
            </div>
            <div id="media-container"></div>

	<script>
		let url = "<?php echo $row['media_url']?>"; // replace this with the URL of the file
		let extension = url.split('.').pop(); // get the file extension

		if (extension === "jpg" || extension === "png" || extension === "gif") {
			// display image
			let image = document.createElement("img");
			image.src = url;
            image.style.width = "50%";
			image.style.display = "block";
			image.style.margin = "auto";
			document.getElementById("media-container").appendChild(image);
		} else if (extension === "mp4" || extension === "webm" || extension === "ogg") {
			// display video
			let video = document.createElement("video");
			video.src = url;
			video.controls = true;
            video.style.width = "80%";
			video.style.height = "auto";
			video.style.maxHeight = "calc(100vh - 50px)";
			document.getElementById("media-container").appendChild(video);
		} else {
			// unsupported file type
			console.error("Unsupported file type");
		}
	</script>
            <div class="content">
                <br>
                <center><p> <?php echo $row['description'] ?></p></center>
            </div>
        </article>
        <?php
        }
    } 
    else {
    echo "No Blogs have been made";
    }
    
    }?>
    <section class="comments">
    <h2>Comments</h2>
    
        <?php
    $sql3 = "SELECT * FROM Comments where PostID = $post_id";
$res = $con->query($sql3);

if ($res->num_rows > 0) 
{
  
  while($row = $res->fetch_assoc())
 {

        ?>
                <div class="comment">
                <div>
                    <a style = "cursor: pointer;"onclick=" ViewProfile('<?php echo $row['username']; ?>' )" ><strong><?php echo $row['username']?></strong></a>
                    <p>     <?php echo $row['Comment']?></p>
                </div>
                </div>
            <?php
            }
        }
        else
        {
            echo("No comments have been made");
        }
            ?>
                  
            <form action='AddComment.php' method='POST'>
            <input type="text" name="post_id" style="visibility:hidden;" value= <?php echo $post_id?> ></input>
            <div class="add-comment">
                
                <textarea name="comment"placeholder="Add your comment..."></textarea>
            </div>
            <button type='submit' class="post-comment-btn">Post</button>
    </form>
        </section>
    </main>

    <footer>
        <p>Copyright by Dextrocity</p>
    </footer>
</body>
</html>
<?php
 
}
else
{

  header("Location: loginpg.php");

  exit();

}
?>