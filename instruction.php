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

  <!-- function for "clicking checkbox to enable button" -->

  <script type="text/javascript">
function enableButton() {
	if(document.getElementById('myCheck').checked){
		document.getElementById('myButton').disabled='';
	} else {
		document.getElementById('myButton').disabled='true';
	}
}
</script>




  <!-- Adds the carousel to this file -->
  <title>Social Dynamics Lab-Policy Lab Pilot Testing</title>
  </head>


  <body onload="enableButton();">


    <!-- header -->
 	 <div class="header" id="myHeader">

  		<h2>Instructions</h2>
	</div>


    <div class="wrapper" id="consent">
      <p>
       Dear Participant,
       <p>
       Please read the following instructions carefully before you begin.
       </p>
       <p>
         The Political Prediction Game tests how well contestants can predict the views of Democrats and Republicans on questions about which the parties have not yet taken a stance.
         At the end of the study, the contestant with the most accurate predictions will win a $100 prize (to be divided equally in case of ties).
         Accordingly, we will show you 16 statements and you have to predict why a party is more likely to agree.
         We will also ask you whether you agree or disagree with the statement.
       </p>
      <p>
        Please note that once you submit your answers and move onto the next item, you will not be able to go back and change your responses. Please do not press the back button on your browser, or you will risk causing your session to end prematurely, which will prevent you from being paid for completing the test.
      </p>
   <br><br>



       <form action="political_id.php" method="post">
       <p><input type="checkbox" id="myCheck" onclick="javascript:enableButton();" >
         I have carefully read the instructions and am ready to continue with the test.<br></p>


     <input type = "submit" class="button" id = "myButton" value = "Continue" onclick="javascript:enableButton();"  >

     </form>


    </div>

  </body>
  </html>

</html>
