<?php

include('test2.php');
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="styles/all.css" media="all" />
  <script src="script/back_button.js"></script>

  <title>Social Dynamics Lab-Policy Lab Pilot Testing</title>

  </head>

  <body>
    <div class="index-banner1">
      <div class="header-top">
        <div class="wrap">

          <h1>Administration</h1>
          <div class="clear"></div>
         </div>
      </div>
    </div>

  <div class="wrapper">

      <?php

        echo '
        <div class="form">
        <form action="show2.php" method="post">
        <select name="sql_input" required>
          <option value="" disabled selected>Select your SQL</option>
          <option value="SELECT * FROM user">All User</option>
          <option value="SELECT * FROM questions">All Question</option>
          <option value="SELECT * FROM user_question_world_answer WHERE world_id LIKE 1">Answers in the independent world</option>
          <option value="SELECT * FROM user_question_world_answer WHERE world_id != 1">Answers in other world</option>
        </select>
          <button name="sql" type="submit" value="sql">Execute</button>
        </form>
        ';

      ?>

    </div>
  </div>
  <?php include('includes/footer.php')?>
  </body>
  </html>

</html>
