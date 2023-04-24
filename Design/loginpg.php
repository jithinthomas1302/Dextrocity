<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Sign up!</title>
    <link rel="stylesheet" href="login.css">
    <script>
             function showError(message) {
  var errorDiv = document.getElementById("error");
  errorDiv.innerHTML = message;
  errorDiv.style.display = "block";
  setTimeout(function() {
    errorDiv.style.display = "none";
  }, 5000); // Hide the error message after 5 seconds
}
</script>
</head>
<body>
    <div class="slider--container">
 
        <img class="slider--image" src="image1.jpg" alt="winter-01" />
        <img class="slider--image" src="image2.jpg" alt="winter-02" />
        <img class="slider--image" src="image3.jpg" alt="winter-03" />
       
      </div>
    <div class="cont" style= "height: 630px;">
        <div class="form sign-in">
          <h2>Sign In</h2><br>
          <form action="login.php" method="post">
            <?php if (isset($_GET['error1'])) { ?>

              <p style="margin-left: 230px; margin-top: 10px; color: red;"><?php echo $_GET['error1']; ?></p>
  
          <?php } ?>
          <br>
          <label>
              <span>Username</span>
              <input type="text" name="username">
          </label>
           
          <label>
              <span>Password</span>
              <input type="password" name="password">
          </label>
            <a href="#">
              <button class="submit" type="submit" name="login">LOG IN</button>
            </a> </form>
          <p class="forgot-pass">Forgot Password ?</p>
      
          <div class="social-media">
            <ul>
              <li><img src="https://raw.githubusercontent.com/abo-elnoUr/public-assets/master/facebook.png"></li>
              <li><img src="https://raw.githubusercontent.com/abo-elnoUr/public-assets/master/twitter.png"></li>
              <li><img src="https://raw.githubusercontent.com/abo-elnoUr/public-assets/master/linkedin.png"></li>
              <li><img src="https://raw.githubusercontent.com/abo-elnoUr/public-assets/master/instagram.png"></li>
            </ul>
          </div>
        </div>
      
        <div class="sub-cont">
          <div class="img">
            <div class="img-text m-up">
              <h2>New here?</h2>
              <p>Sign up and discover great amount of new opportunities!</p>
            </div>
            <div class="img-text m-in">
              <h2>One of us?</h2>
              <p>If you already has an account, just sign in. We've missed you!</p>
            </div>
            <div class="img-btn">
              <span class="m-up">Sign Up</span>
              <span class="m-in">Sign In</span>
            </div>
          </div>
          <div class="form sign-up">
            <h2>Sign Up</h2>
          <form action="Artistregistration.php" method="post">
            <?php if (isset($_GET['error'])) { ?>

              <p style="margin-left: 200px; margin-top: 10px; color: red;"><?php echo $_GET['error']; ?></p>
  
          <?php } ?>
            
            <label>
              <span>Username</span>
              <input type="text" name="username">
            </label>
            <label>
              <span>Email</span>
              <input type="email" name="email">
            </label>
            <label>
  <span style="display: block; margin-bottom: 5px;">Select User type</span>
  <select name="user_type" style="background-color:#white; color: #505f75;; padding: 14px; font-size: 16px; border: 2px #505f75;; cursor: pointer;">
  <option value="artist">Artist</option>
  <option value="customer">Customer</option>
</select>

</label>

            <label>
              <span>Password</span>
              <input type="password" name="password">
            </label>
            <label>
              <span>Confirm Password</span>
              <input type="password" name="confirmpassword">
            </label>
            <button type="submit" class="submit" name="register">Sign Up Now</button></form>
          </div>
        </div>
      </div>
      <script src="./login.js"></script>
</body>
</html>
