<?php
// include('includes/header.php');
include('test2.php');
$preference = $_GET["preference"];
exec_sql_query($myPDO, "UPDATE user_question_world_answer SET user_yes_no = '$preference' WHERE user_id = '$current_user' AND question_id = '$id_carrier'");

$dataPoints = array(
	array("y" => 100*$support_rate_of_demo, "label" => "Democrats" ),
	array("y" => 100*$support_rate_of_repub, "label" => "Republican" ),

);

?>
<!DOCTYPE HTML>
<html>
<head>
<link href="styles/all.css" rel="stylesheet" type="text/css"  />

<script src="//code.jquery.com/jquery-1.12.1.min.js"></script>
<script src="script/jquery.backDetect.js"></script>
<script src="script/back_button.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#show1").delay(3000).fadeIn();
    $("#support").delay(3000).fadeIn();
    $("#oppose").delay(3000).fadeIn();
});
</script>

<div class="no_chart_question_text">
<p >

</p>
</div>

</head>
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
<body>
  <div class="wrapper4">
		<?php
			if (($support_num_of_demo_percent == 0 && $oppose_num_of_demo_percent == 0) && ($support_num_of_repub_percent == 0 && $oppose_num_of_repub_percent == 0)) {
			echo'<form action="yes.php?preference=1" method="post">';
		}else if($id_carrier == 24){
			echo'<form action="game_start.php" method="post">';
		}else{
				echo'<form action="practice_1.php" method="post">';
			}
		?>
        <p class="question_text">
          Next, we would like to know your own individual opinion.
        </p>
				<p class="question_text" style="display: none;" id="show1">
		      As a <?php echo "$user_political_id" ?>, would you be more likely to agree or disagree with this statement?
		    </p>
		    <button style="display: none;" id="support" name="oppose" type="submit" value="oppose">
		      I <span class="italic">disagree</span> with this statement.
		    </button>
		    <button  style="display: none;" id="oppose" name="support" type="submit" value="support">
		      I <span class="italic">agree</span> with this statement.
				</button>
    </form>
  </div>
</body>
</html>
