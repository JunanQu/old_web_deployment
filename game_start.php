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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
$(document).ready(function(){
    $("#continue_button").delay(3000).fadeIn();
});
</script>

  <title>Social Dynamics Lab-Policy Lab Pilot Testing</title>

  </head>

  <body>
    <div class="index-banner1">
      <div class="header-top">
        <div class="wrap">

          <h1> Game Start </h1>
          <div class="clear"></div>
         </div>
      </div>
    </div>
  <div class="wrapper3">
      <?php
        // if (($support_num_of_demo_percent == 0 && $oppose_num_of_demo_percent == 0) && ($support_num_of_repub_percent == 0 && $oppose_num_of_repub_percent == 0)) {
        // echo'<form action="no.php" method="post">';
        // }else{
        echo'<form action="question.php?preference=1" method="post">';
        // }
      ?>
      <label>Now that you have had a chance to practice, we will start the game.</label>
      <label>Click “CONTINUE” when you are ready to begin.</label>
      <button id="continue_button" name="continue" type="submit" value="continue">Continue</button>
      </form>


  </div>
  <?php include('includes/footer.php')?>
  </body>
  </html>

</html>
