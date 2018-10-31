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

  </head>

  <body>
    <div class="index-banner1">
      <div class="header-top">
        <div class="wrap">

          <h1> Political Party Preference </h1>
          <div class="clear"></div>
         </div>
      </div>
    </div>

  <div class="wrapper">

      <?php
      if ( $current_user_world_id == 1 ){
      echo'
      <div class="form">
      <form action="practice_question.php" method="post">
      <label>Which of the two main political parties in the U.S. are you more likely to support?</label>
      <select name="political_stand" required>
        <option value="" disabled selected>Select your preference</option>
        <option value="strong Democrats">I strongly support the Democratic Party</option>
        <option value="Democrats">I support the Democratic Party</option>
        <option value="neither">Independent/neither</option>
        <option value="Republicans">I support the Republican Party</option>
        <option value="strong Republicans">I strongly support the Republican Party</option>
      </select>
      <button name="party_id_continue" type="submit" value="party_id_continue">Continue</button>
      </form>
      ';
       }else{
      echo'
      <div class="form">
      <form action="practice_question.php" method="post">
      <label>Which of the two main political parties in the U.S. are you more likely to support?</label>
      <select name="political_stand" required>
        <option value="" disabled selected>Select your preference</option>
        <option value="strong Democrats">I strongly support the Democratic Party</option>
        <option value="Democrats">I support the Democratic Party</option>
        <option value="neither">Independent/neither</option>
        <option value="Republicans">I support the Republican Party</option>
        <option value="strong Republicans">I strongly support the Republican Party</option>
      </select>
      <button name="party_id_continue" type="submit" value="party_id_continue">Continue</button>
      </form>
      ';
       }
      ?>

    </div>
  </div>
  <?php include('includes/footer.php')?>
  </body>
  </html>

</html>
