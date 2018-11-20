<?php
include('test2.php');

if (!$num_of_users<=1 && !(($support_num_of_demo_percent == 0 && $oppose_num_of_demo_percent == 0))) {

if ($support_rate_of_demo_percent >= 95){
  $support_rate_of_demo_percent = rand(95,98);
  $oppose_rate_of_demo_percent = 100-$support_rate_of_demo_percent;
}
if ($support_rate_of_demo_percent <= 5){
  $support_rate_of_demo_percent = rand(1,5);
  $oppose_rate_of_demo_percent = 100-$support_rate_of_demo_percent;
}
}
if(!($support_num_of_repub_percent == 0 && $oppose_num_of_repub_percent == 0)) {
  if($support_rate_of_repub_percent >= 95){
    $support_rate_of_repub_percent = rand(95,98);
    $oppose_rate_of_repub_percent = 100 - $support_rate_of_repub_percent;
  }
  if($support_rate_of_repub_percent <= 5){
    $support_rate_of_repub_percent = rand(1,5);
    $oppose_rate_of_repub_percent = 100 - $support_rate_of_repub_percent;
  }
}
$preference = $_GET["preference"];
// if($support_num_of_demo_percent==0&&$oppose_num_of_demo_percent==0&&$support_num_of_repub_percent==0&&$oppose_num_of_repub_percent==0){
//   $dataPoints = array(
//   	array("y" => null, "label" => "Democrats" ),
//   	array("y" => null, "label" => "Republicans" ),
//   );
//
// }else if ($id_carrier == 23){
//   $dataPoints = array(
//   	array("y" => 12, "label" => "Democrats" ),
//   	array("y" => 88, "label" => "Republicans" ),
//   );
// }else if($id_carrier == 24){
//   $dataPoints = array(
//     array("y" => 91, "label" => "Democrats" ),
//     array("y" => 12, "label" => "Republicans" ),
//   );
// }else
// if (($support_num_of_demo_percent != 0 || $oppose_num_of_demo_percent != 0) && ($support_num_of_repub_percent != 0 || $oppose_num_of_repub_percent != 0)){
// var_dump($support_num_of_demo_percent,$oppose_num_of_demo_percent,$support_num_of_repub_percent,$oppose_num_of_repub_percent);
if ($id_carrier == 23){
  echo "23";
  $dataPoints = array(
  	array("y" => 12, "label" => "Democrats" ),
  	array("y" => 88, "label" => "Republicans" ),
  );
}else if($id_carrier == 24){
  echo "24";
  $dataPoints = array(
  	array("y" => 91, "label" => "Democrats" ),
  	array("y" => 9, "label" => "Republicans" ),
  );
}
else if ((($support_num_of_demo_percent == 0 && $oppose_num_of_demo_percent == 0) && ($support_num_of_repub_percent == 0 && $oppose_num_of_repub_percent == 0))||($current_user_world_id==1)) {
  echo "null";
  $dataPoints = array(
    array("y" => null, "label"=> "Democrats: $support_rate_of_demo_percent% Agree" ),
    array("y" => null, "label"=> "Republicans: $support_rate_of_repub_percent% Agree" ),
  );
}else{
  $dataPoints = array(
  	array("y" => $support_rate_of_demo_percent, "label"=> "Democrats: $support_rate_of_demo_percent% Agree" ),
  	array("y" => $support_rate_of_repub_percent, "label"=> "Republicans: $support_rate_of_repub_percent% Agree" ),
  );
}
// }
// else if(($support_num_of_demo_percent == 0 && $oppose_num_of_demo_percent == 0) && ($support_num_of_repub_percent != 0 || $oppose_num_of_repub_percent != 0)){
//   $dataPoints = array(
//   	array("y" => null, "label"=> " " ),
//   	array("y" => $support_rate_of_repub_percent, "label"=> "Republicans: $support_rate_of_repub_percent% Agree" ),
//   );
// }else if(($support_num_of_repub_percent == 0 && $oppose_num_of_repub_percent == 0) && ($support_num_of_demo_percent != 0 || $oppose_num_of_demo_percent != 0)){
//   $dataPoints = array(
//   	array("y" => $support_rate_of_demo_percent, "label"=> "Democrats: $support_rate_of_demo_percent% Agree" ),
//   	array("y" => null, "label"=> " " ),
//   );
// }else{
//   $dataPoints = array(
//   	array("y" => null, "label"=> null),
//   	array("y" => null, "label"=> null ),
//   );
// }

$dominant_party = '';
$nondominant_party = '';

if ($support_num_of_demo_percent > $support_num_of_repub_percent) {
  // If more democrats support.
  $dominant_party = 'Democrats';
  $nondominant_party = 'Republicans';
} else if ($support_num_of_demo_percent < $support_num_of_repub_percent) {
  // If more republicans support.
  $dominant_party = 'Republicans';
  $nondominant_party = 'Democrats';
} else {
  // If equal.
  $dominant_party = 'Neither';
  $nondominant_party = 'Neither';
}
?>
<!DOCTYPE HTML>
<html>
<head>
<link href="styles/all.css" rel="stylesheet" type="text/css"/>
<style>
.left {
	float: left;
}
.right {
	float: right;
}
.box {
	width: 50vw;
	box-sizing: border-box;
}
.box.left p {
	font-size: 16px;
}
.box p {
	margin-bottom: 10px;
	text-align: center;
}

.reasons_question {
	margin-top: 20px;
}

.reason {
	padding: 10px;
	margin: 10px;
	display: flex;
	flex-direction: row;
	box-sizing: border-box;
}

.reason .reason_button {
	border: none;
	padding: 10px;
	font-size: 14px;
	background: #e0e0e0;
	flex: 1;
	text-transform: uppercase;
	border-radius: 3px;
}

.reason.enabled .reason_button {
	cursor: pointer;
}

.reason.enabled .reason_button:hover {
	background: gray;
}

.reason .desc {
	flex: 3;
	margin-left: 10px;
}

.to_show {
  opacity: 0.1;
}

.cont {
  margin-bottom: 30px;
}

.reasons_question {
  max-width: 500px;
  margin-left: calc(50% - 250px);
}
</style>
</head>
<body>
	<!-- ================ BANNER ================ -->
	<div class="index-banner1">
		<div class="header-top">
			<div class="wrap">
				<h1 class="content_q <?php echo $dominant_party ?>"><?php
				if ($id_carrier == 23) {
					echo "PRACTICE QUESTION: The Supreme Court has gone too far in liberalizing access to abortion.";
				} else if ($id_carrier == 24) {
					echo "PRACTICE QUESTION: The Affordable Care Act ('Obamacare') should be strengthened, not weakened or abolished." ;
				} else {
					$records = exec_sql_query($myPDO,
							"SELECT question_content FROM questions WHERE questions.id ='". $id_carrier."'")->fetch(PDO::FETCH_ASSOC);
					if ($records) {
						// echo("Question ".$current_seq_by_count.". ".'"'.$records['question_content'].'"');
            // Removes the question number in the title.
            echo('"'.$records['question_content'].'"');
					}
				};
	      ?></h1>
				<div class="clear_chart"></div>
			 </div>
		</div>
	</div>

	<!-- ================ BODY ================ -->
<div class="wrapper5" style="width:100% !important;">
  <div class="cont to_hide">
    <p>
      <?php
        if ($dominant_party=='Neither') {
          echo 'So far, <span class="Democrats">Democrats</span> and <span class="Republicans">Republicans</span> are equally likely to agree with this statement.';
        } else {
          echo 'So far, <span class="'.$dominant_party.'">'.$dominant_party.'</span> are more likely than <span class="'.$nondominant_party.'">'.$nondominant_party.'</span> to agree with this statement.';
        }
      ?>
    </p>
    <br>
    <p>
      Please take a few moments to read the question carefully and think about
      why this might be the case.
    </p>
  </div>
  <div class="cont to_show">
    <p>
      Based on the bar chart to the right, pick the reason <?php echo "$user_political_id"?>
      players might might answer differently than the other party.
    </p>
		<div class="reasons_question">
			<form action="party_prediction_question.php?preference=1" method="post">
        <!-- IDEOLOGY -->
				<div class="reason">
					<input name="ideology" type="submit" class="reason_button" value="ideology" disabled>
					</input>
					<div class="desc">
						Because the issue involves <?php echo "$user_political_id" ?> party
            values (liberal vs. conservative).
					</div>
				</div>

        <!-- HISTORY -->
				<div class="reason">
					<input name="history" type="submit" class="reason_button" value="history" disabled>
					</input>
					<div class="desc">
            Because the issue involves historical <?php echo "$user_political_id" ?> party
						positions.
          </div>
				</div>

        <!-- POPULARITY -->
				<div class="reason">
					<input name="popularity" type="submit" class="reason_button" value="popularity" disabled>
					</input>
					<div class="desc">
            Because the issue is important to the <?php echo "$user_political_id" ?>
						party’s core political base.
          </div>
				</div>
			</form>
	   </div>
  </div>
</div>
</body>

<!-- ================ IMPORTS ================ -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="//code.jquery.com/jquery-1.12.1.min.js"></script>
<script src="script/jquery.backDetect.js"></script>
<script src="script/back_button.js"></script>
<script>
$(document).ready(function() {
	console.log('Ready!');
	setTimeout(enableQuestion, 7000);
});

function showEl_(elToShow, opt_harshTransition) {
    let time = opt_harshTransition ? 0 : 1000;

    elToShow.each(function(ind) {
        let self = $(this);
        if (self.hasClass('opinion_response')) {
            // If button (i.e., was just disabled)
            self.prop('disabled', false);
            self.fadeTo(time, 1);
        } else {
            // If manually obfuscated
            self.css({
                visibility: 'visible'
            }).fadeTo(time, 1);
        }
    });
}

function hideEl_(elToHide, opt_harshTransition) {
  let time = !!opt_harshTransition ? 0 : 1000;

  elToHide.each(function(ind) {
    let self = $(this);
    if (self.hasClass('opinion_response')) {
      self.prop('disabled', true);
    }
    self.fadeTo(time, 0.1);
  });
}

function enableQuestion() {
	$(".reasons_question").fadeTo(500, 1);
	$(".reason").addClass('enabled');
	$(':input[type="submit"]').prop('disabled', false);

  showEl_($('.to_show'));
  hideEl_($('.to_hide'));
}
</script>
<script src="script/canvasjs.min.js"></script>

</html>
