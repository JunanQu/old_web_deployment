<?php include('test2.php');
 // include('includes/header.php');
?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="styles/all.css" media="all" />



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
  $(document).ready(function(){
      $("#form_delay").delay(3000).fadeIn();
  });
  </script>
  <script src="//code.jquery.com/jquery-1.12.1.min.js"></script>
    <script src="script/jquery.backDetect.js"></script>
    <script src="script/back_button.js"></script>

  <title>Social Dynamics Lab-Policy Lab Pilot Testing</title>

  </head>

  <body>
    <div class="index-banner1">
      <div class="header-top">
        <div class="wrap">

          <h1 class="content_q"><?php
    			if ($id_carrier == 23){
    				echo "PRACTICE QUESTION: The Supreme Court has gone too far in liberalizing access to abortion." ;
    			}elseif ($id_carrier == 24) {
    				echo "PRACTICE QUESTION: The Affordable Care Act ('Obamacare') should be strengthened, not weakened or abolished." ;
    			}else{
    			$records = exec_sql_query($myPDO, "SELECT question_content FROM questions WHERE questions.id ='". $id_carrier."'")->fetch(PDO::FETCH_ASSOC);
    			if($records){
    				echo("Question ".$current_seq.". ".'"'.$records['question_content'].'"');
    				}
    			};
          ?></h1>
          <div class="clear"></div>
         </div>
      </div>
    </div>

    <div class="wrapper2">
    <form id="form_delay" style="display:none" action="" method="post">
    		<p class="question_text_practice">
          Before making your prediction, would you like to see how others have responded so far?
    		</p>
    		<button id="yes" name="yes" type="submit" value="support">
    			Yes
    		</button>
    		<button id="no" name="no" type="submit" value="oppose">
    			No
    </button>
    </form>
    </div>
  <?php include('includes/footer.php')?>
  </body>
  </html>

</html>
