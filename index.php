<?php include('test2.php');
 // include('includes/header.php');
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="styles/all.css" media="all" />

  <script src="//code.jquery.com/jquery-1.12.1.min.js"></script>
  <script src="script/jquery.backDetect.js"></script>
  <script src="script/back_button.js"></script>


  <title>Social Dynamics Lab-Policy Lab Pilot Testing</title>
  <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>

  <body>
    <div class="index-banner1 gray-banner">
      <div class="header-top">
        <div class="wrap">

          <h1>Welcome to the Political Prediction Game</h1>
          <div class="clear"></div>
         </div>
      </div>
    </div>

  <div class="wrapper">

        <div class="form">
        <p>You must log in using your MTURK user ID in order to participate:
        </p>
        <form action="consent0.php" method="post">
        <label>MTURK USER ID</label>
        <input type="text" name="mTurk_code" placeholder="MTURK ID" required />
        <!-- <div class="g-recaptcha" data-sitekey="6LffU3AUAAAAAIv9pedaBYQR0VbK-UlXWyyNnyqi"></div> -->
        <button name="login" type="submit" value="LogIn">Log In</button>
        </form>
    </div>
  </div>
  <?php include('includes/footer.php')?>
  </body>
  </html>

</html>
