<?php
// include('includes/header.php');
include('test2.php');
// $preference = $_GET["preference"];
// exec_sql_query($myPDO, "UPDATE user_question_world_answer SET user_yes_no = '$preference' WHERE user_id = '$current_user' AND question_id = '$id_carrier'");


$dataPoints = array(
	array("y" => 100*$support_rate_of_demo, "label" => "Democrats" ),
	array("y" => 100*$support_rate_of_repub, "label" => "Republican" ),

);

?>
<!DOCTYPE HTML>
<html>
<head>
<link href="styles/all.css" rel="stylesheet" type="text/css"  />
<script src="script/jquery.backDetect.js"></script>
<script src="script/back_button.js"></script>
<script src="script/canvasjs.min.js"></script>

<div class="no_chart_question_text">
<p >

</p>
</div>

</head>
<div class="index-banner1">
	<div class="header-top">
		<div class="wrap">

			<h1 class="content_q">
			<?php
			if ($id_carrier == 23){
				echo "PRACTICE QUESTION 1: The Supreme Court has gone too far in liberalizing access to abortion." ;
			}elseif ($id_carrier == 24) {
				echo "PRACTICE QUESTION 2: The Affordable Care Act ('Obamacare') should be strengthened, not weakened or abolished." ;
			}else{
			$records = exec_sql_query($myPDO, "SELECT question_content FROM questions WHERE questions.id ='". $id_carrier."'")->fetch(PDO::FETCH_ASSOC);
			if($records){
				echo("Question ".$current_seq.". ".'"'.$records['question_content'].'"');
				}
			};
      ?></h1>
			<?php
						// var_dump($all_demo_in_world, $all_republican_in_world);
			?>
			<div class="clear"></div>
		 </div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#page_yes").delay(3000).fadeIn();
});
</script>
<body>
  <div class="wrapper4">
		<form  style="display:none"  id="page_yes" action="i_page_no.php?preference=0" method="post">
		    <p class="question_text">
		      Which party do you predict will be more likely to agree with this statement?
		    </p>
		    <button id="support" name="party_repu" type="submit" value="Democrat_support">
		      <span class="italic">Republicans</span> WILL BE MORE LIKELY TO AGREE
		    </button>
		    <button id="oppose" name="party_demo" type="submit" value="Republican_support">
		      <span class="italic">Democrats</span> WILL BE MORE LIKELY TO AGREE
		</button>
  </div>
</body>
</html>
