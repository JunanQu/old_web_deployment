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
var_dump($support_num_of_demo_percent,$oppose_num_of_demo_percent,$support_num_of_repub_percent,$oppose_num_of_repub_percent);
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
?>
<!DOCTYPE HTML>
<html>
<head>
<link href="styles/all.css" rel="stylesheet" type="text/css"/>

<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		margin:20,
		<?php
		if(($support_num_of_demo_percent == 0 || $oppose_num_of_demo_percent == 0) && ($support_num_of_repub_percent != 0 || $oppose_num_of_repub_percent != 0)){
			$oppo_stand = "Republican";
		}else{
			$oppo_stand = "Democratic";
		}
		if($id_carrier == 23 || $id_carrier == 24){
			echo "text: 'Percent who agree, by political party'";
		}else if ($all_demo_in_world == 0 OR $all_republican_in_world == 0){
			echo "text: 'So far, all the participants have been from the ".$oppo_stand." Party'";
		}else{
			echo "text: 'Percent who agree, by political party',";
		}?>
		// text: "So far, <?php echo ($all_demo_in_world); ?> Democrats and <?php echo ($all_republican_in_world); ?> Republicans have responded to this question. Here are their responses:"
	},
	animationEnabled: true,
	toolTip:{
		shared: false,
		reversed: false
	},
	interactivityEnabled: false,
	axisX: {
	labelFontSize: 15
	},
  axisY: {
    suffix:"%",
    maximum:100,
    minimum:0,
    title: "Support Rate",
    labelFontSize: 25
  },
  data: [
  {
    indexLabel: "{y}% Agree",
    indexLabelFontWeight: "bold",
    indexLabelFontSize: 12,
    indexLabelFontColor: "black",
    type: "column",
    showInLegend: true,
    legendMarkerType: "none",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
  }
  ]
});

chart.render();

}
</script>


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
	opacity: 0.2;
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
</style>
</head>
<body>
	<!-- ================ BANNER ================ -->
	<div class="index-banner1">
		<div class="header-top">
			<div class="wrap">
				<h1 class="content_q"><?php
				if ($id_carrier == 23) {
					echo "PRACTICE QUESTION: The Supreme Court has gone too far in liberalizing access to abortion.";
				} else if ($id_carrier == 24) {
					echo "PRACTICE QUESTION: The Affordable Care Act ('Obamacare') should be strengthened, not weakened or abolished." ;
				} else {
					$records = exec_sql_query($myPDO,
							"SELECT question_content FROM questions WHERE questions.id ='". $id_carrier."'")->fetch(PDO::FETCH_ASSOC);
					if ($records) {
						echo("Question ".$current_seq_by_count.". ".'"'.$records['question_content'].'"');
					}
				};
	      ?></h1>
				<div class="clear_chart"></div>
			 </div>
		</div>
	</div>

	<!-- ================ BODY ================ -->
	<!-- <div class="box left"> -->
  <?php
  if (((($support_num_of_demo_percent == 0 && $oppose_num_of_demo_percent == 0) && ($support_num_of_repub_percent == 0 && $oppose_num_of_repub_percent == 0))||($current_user_world_id==1))&&($id_carrier!=23&&$id_carrier!=24)) {
    echo '<div class="wrapper5" style="width:75% !important; margin:10%; margin-top:0;">';
  }
  else {
    echo '<div class="wrapper5">';
  }
 ?>
  <!-- <div class="wrapper5" style="width:100% !important;"> -->

<?php
if (($support_num_of_demo_percent == 0 && $oppose_num_of_demo_percent == 0)
    && ($support_num_of_repub_percent == 0 && $oppose_num_of_repub_percent == 0)
    && $id_carrier != 23 && $id_carrier != 24) {
		echo "<p>Pick the reason ";
    echo "$user_political_id";
    echo " players might answer differently than the other party.</p>";
  } else {
    echo "
        <p>
        <em>Please take 10 seconds to read the statement carefully and think about the
    		past views of previous participants.
        </em>
        </p>
        <p>Based on the bar chart to the right, pick the reason ";
    echo "$user_political_id";
    echo " players might might answer differently than the other party</p>";
  }
?>
		<div class="reasons_question">
			<form action="party_prediction_question.php?preference=1" method="post">
				<div class="reason">
					<input name="ideology" type="submit" class="reason_button" value="ideology" disabled>
					</input>
					<div class="desc">
						Because the issue involves <?php echo "$user_political_id" ?> party values (liberal vs. conservative).
					</div>
				</div>
				<div class="reason">
					<input name="history" type="submit" class="reason_button" value="history" disabled>
					</input>
					<div class="desc">Because the issue involves historical <?php echo "$user_political_id" ?> party
						positions.</div>
				</div>
				<div class="reason">
					<input name="popularity" type="submit" class="reason_button" value="popularity" disabled>
					</input>
					<div class="desc">Because the issue is important to the <?php echo "$user_political_id" ?>
						party’s core political base.</div>
				</div>
			</form>
	   </div>
  </div>
	<!-- <div id="chartContainer" class="box right" style="height: 350px; width: 50%; "></div> -->
  <?php
  if (((($support_num_of_demo_percent == 0 && $oppose_num_of_demo_percent == 0) && ($support_num_of_repub_percent == 0 && $oppose_num_of_repub_percent == 0))||($current_user_world_id==1))&&($id_carrier!=23&&$id_carrier!=24)) {
  }else {
    echo ('<div id="chartContainer" style="height: 350px; width: 50%; float: right;"></div>');
  }
  ?>
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
    	setTimeout(enableQuestion, 5000);
	});

	function enableQuestion() {
		$(".reasons_question").fadeTo(500, 1);
		$(".reason").addClass('enabled');
		$(':input[type="submit"]').prop('disabled', false);
	}
</script>
<script src="script/canvasjs.min.js"></script>

</html>
