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
  <title>Social Dynamic's Lab-Policy Lab Pilot Testing</title>
  </head>


  <body onload="enableButton();">


    <!-- header -->
 	 <div class="header" id="myHeader">

  		<h2>Thank you for participating</h2>
	</div>


    <div class="wrapper" id="consent">
        <p>
           Dear Participant,

         <p>
           Thank you for your interest in our study.
           Please read this page carefully and check the box if you agree to participate.
         </p>

        <p>
          You must be 18 years old or older to participate.
          You may print a copy of this page for your records.
          The purpose of this study is to test group differences in political and cultural beliefs between the two main political parties in the U.S.
        </p>

         <p>
           If you agree to take part in this study, we will ask you to indicate whether you agree or disagree with 16 statements and why you believe other people may agree with such statements in an anonymous setting.
           This should take less than 12 minutes, for which you will be paid $2.00.
         </p>
         <p>
          Taking part in this study is completely voluntary.
          If you decide to participate,
          you are free to withdraw at anytime and you are free to stop at any time for any reason.
          However, should you decide to withdraw, you will forfeit your payment.
         </p>
         <p>
          Your responses will be completely anonymous.
          We do not collect any personally identifiable information.
          Your test responses will be stored on an encrypted database.
          Only researchers involved in this study will have access to this information.
          The records will not contain your name or any other personal information that could be used to identify you.
          In any report we make public, we will only discuss group averages and will not include any individual information.
         </p>
         <p>
           This study is conducted by researchers from Cornell University: Dr. Michael Macy, Alexander Ruch, Natalie Tong, and Sebastian Deri.
           If you have any questions about this research, you may reach Dr. Macy by email at mwmacy@cornell.edu.
         </p>
         <p>
         If you have any questions or concerns regarding your rights as a participant in this study,
         you may contact Cornell University's Institutional Review Board at 607-255-5138 or irb.cornell.edu.
         You may also report your concerns or complaints anonymously to Ethicspoint at hotline.cornell.edu or 1-866-293-3077.
         Ethicspoint is an independent liaison organization that ensures anonymity of anyone with a complaint about a research project in which they are participating.
         </p>
       </p>
       <br><br>




       <?php
       // $politic_dump = exec_sql_query($myPDO, "SELECT political_stand FROM user WHERE mturk Like '$current_user'")->fetchAll();
       // $politic_dump = $politic_dump[0]['political_stand'];
       // var_dump($support_num_of_demo_percent,$oppose_num_of_demo_percent,$support_num_of_repub_percent,$oppose_num_of_repub_percent);
       if ( $current_user_world_id == 1 ){
       echo'<form action="instruction.php" method="post">';
     }elseif (($support_num_of_demo_percent == 0 && $oppose_num_of_demo_percent == 0) && ($support_num_of_repub_percent == 0 && $oppose_num_of_repub_percent == 0)) {
       echo'<form action="game_instructions.php" method="post">';
     }
        else{
       echo'<form action="game_instructions2.php" method="post">';
        }
       ?>
       <p><input type="checkbox" id="myCheck" onclick="javascript:enableButton();" >
         I have read the above information and consent to take part in the study.<br></p>


     <input type = "submit" class="button" id = "myButton" value = "I consent to participate" onclick="javascript:enableButton();"  >

     </form>


    </div>

  </body>
  </html>

</html>
