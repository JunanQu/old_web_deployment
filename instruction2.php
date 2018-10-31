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
  </head>


  <body onload="enableButton();">


    <!-- header -->
 	 <div class="header" id="myHeader">

  		<h2>Instructions</h2>
	</div>


    <div class="wrapper" id="consent">
       <form action="political_id.php" method="post">
       <p><input type="checkbox" id="myCheck" onclick="javascript:enableButton();" >
         I have carefully read the instructions and am ready to continue with the test.<br></p>


     <input type = "submit" class="button" id = "myButton" value = "Continue" onclick="javascript:enableButton();" disabled>

     </form>
    </div>
  </body>

<script type="text/javascript">
// Function for "clicking checkbox to enable button"
function enableButton() {
	if(document.getElementById('myCheck').checked){
		document.getElementById('myButton').disabled='';
	} else {
		document.getElementById('myButton').disabled='true';
	}
}
</script>
</html>
