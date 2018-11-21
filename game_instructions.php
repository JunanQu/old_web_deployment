<!-- <?php include('includes/header.php')?> -->
<?php include('test2.php')?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="styles/style2.css" media="all" />

  <script src="//code.jquery.com/jquery-1.12.1.min.js"></script>
  <script src="script/jquery.backDetect.js"></script>
  <script src="script/back_button.js"></script>

  <!-- Adds the carousel to this file -->
  <title>Social Dynamics Lab-Policy Lab Pilot Testing</title>

<style>
</style>
</head>
<body>
    <div class="header" id="myHeader">
      <h2 style="margin-left:35%;">Instructions</h2>
    </div>

    <div class="wrapper" id="consent">
       <form action="political_id.php" method="post">
         <p class="instruction_title">
           <strong>
             Please read each of the following instructions and check the box next to them.
             <br/>
             You will be able to continue once you have read and checked off each item.
           </strong>
         </p>
         <p>
             You will see 15 opinions about novel political and cultural issues. For each issue, you will:
         </p>

         <p class="item1">
           <input type="checkbox" class="item">
           See the opinions of previous players from each political party.
         </p>
         <p class="item2">
             <input type="checkbox" class="item">
             Choose the most likely reason for your party's opinion: ideaology, history, or popularity.
         </p>

         <p class="item3">
           <input type="checkbox" class="item">
           Predict which political party is more likely to agree.
         </p>
         <p class="item4">
           <input type="checkbox" class="item">
          The player with the most accurate predictions will win $100, divided equally in case of ties. Accuracy will be judged using previously collected survey data.
         </p>

         <p class="item5">
           <input type="checkbox" class="item">
           Indicate whether you personally agree or disagree with the opinion.
         </p>

         <p class="item6">
           <input type="checkbox" class="item">
           PLEASE DO NOT PRESS THE BACK BUTTON ON YOUR BROWSER! This may erase your data.
         </p>

     <p>
         When you have read these instructions, please check the box below
         and press continue:
         <br/>
         <input type="checkbox" class="item">
         I have carefully read the instructions and am ready to continue
         with the test.
     </p>

     <p class="continue_label">
       <strong>Click "CONTINUE" when you are ready to begin the game.</strong>
     </p>
           <input type="submit" class="button" id="submitButton" value="CONTINUE" disabled>
        </form>
    </div>
</body>

<script type="text/javascript">
/**
 * This will enable the submit button if and only if ALL checklist form items
 * with the class name "item" are checked.
 */
  var unselectedItems = $('.item').size();
  $('.item').click((e) => {
      if (e.target.checked) {
          unselectedItems--;
      } else {
          unselectedItems++;
      }
      $('#submitButton').prop('disabled', unselectedItems !== 0);
  });
</script>

</html>
