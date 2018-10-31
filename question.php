<?php
// include('includes/header.php');
include('test2.php');
include('proceed.php');

// $preference = $_GET["preference"];
// exec_sql_query($myPDO, "UPDATE user_question_world_answer SET user_yes_no = '$preference' WHERE user_id = '$current_user' AND question_id = '$id_carrier'");
if($num_of_users == 1){
	$dataPoints1 = array(
		array("label"=> null, "y"=> null, "x"=>null ),
		array("label"=> null, "y"=> null),
	);
	$dataPoints2 = array(
		array("label"=> null, "y"=> null, "x"=>null),
		array("label"=> null, "y"=> null),
	);

	$dataPoints3 = array(
		array("label"=> null, "y"=> null),
		array("label"=> null, "y"=> null, "x"=>null)
	);

	$dataPoints4 = array(
		array("label"=> null, "y"=> null),
		array("label"=> null, "y"=> null, "x"=>null)
	);
}else if ($id_carrier == 23){


	$dataPoints1 = array(
		array("label"=> "Democrats: 12% Agree", "y"=> 12, "z"=>$support_num_of_demo_percent),
		array("label"=> "Republicans: 91% Agree", "y"=> null),
	);
	$dataPoints2 = array(
		array("label"=> "Democrats: 12% Agree", "y"=> 88, "z"=>$oppose_num_of_demo_percent),
		array("label"=> "Republicans: 91% Agree", "y"=> null),
	);

	$dataPoints3 = array(
		array("label"=> "Democrats: 12% Agree", "y"=> null),
		array("label"=> "Republicans: 91% Agree", "y"=> 91, "z"=>$support_num_of_repub_percent)
	);

	$dataPoints4 = array(
		array("label"=> "Democrats: 12% Agree", "y"=> null),
		array("label"=> "Republicans: 91% Agree", "y"=> 9, "z"=>$oppose_num_of_repub_percent)
	);
}else if($id_carrier == 24){
	$dataPoints1 = array(
		array("label"=> "Democrats: 91% Agree", "y"=> 91, "z"=>$support_num_of_demo_percent),
		array("label"=> "Republicans: 12% Agree", "y"=> null),
	);
	$dataPoints2 = array(
		array("label"=> "Democrats: 91% Agree", "y"=> 9, "z"=>$oppose_num_of_demo_percent),
		array("label"=> "Republicans: 12% Agree", "y"=> null),
	);

	$dataPoints3 = array(
		array("label"=> "Democrats: 91% Agree", "y"=> null),
		array("label"=> "Republicans: 12% Agree", "y"=> 12, "z"=>$support_num_of_repub_percent)
	);

	$dataPoints4 = array(
		array("label"=> "Democrats: 91% Agree", "y"=> null),
		array("label"=> "Republicans: 12% Agree", "y"=> 88, "z"=>$oppose_num_of_repub_percent)
	);
}else if (($support_num_of_demo_percent != 0 || $oppose_num_of_demo_percent != 0) && ($support_num_of_repub_percent != 0 || $oppose_num_of_repub_percent != 0)){
		$dataPoints1 = array(
			array("label"=> "Democrats: $support_rate_of_demo_percent% Agree", "y"=> $support_rate_of_demo_percent, "z"=>$support_num_of_demo_percent),
			array("label"=> "Republicans: $support_rate_of_repub_percent% Agree", "y"=> null),
		);
		$dataPoints2 = array(
			array("label"=> "Democrats: $support_rate_of_demo_percent% Agree", "y"=> $oppose_rate_of_demo_percent, "z"=>$oppose_num_of_demo_percent),
			array("label"=> "Republicans: $support_rate_of_repub_percent% Agree", "y"=> null),
		);

		$dataPoints3 = array(
			array("label"=> "Democrats: $support_rate_of_demo_percent% Agree", "y"=> null),
			array("label"=> "Republicans: $support_rate_of_repub_percent% Agree", "y"=> $support_rate_of_repub_percent, "z"=>$support_num_of_repub_percent)
		);

		$dataPoints4 = array(
			array("label"=> "Democrats: $support_rate_of_demo_percent% Agree", "y"=> null),
			array("label"=> "Republicans: $support_rate_of_repub_percent% Agree", "y"=> $oppose_rate_of_repub_percent, "z"=>$oppose_num_of_repub_percent)
		);
}else if(($support_num_of_demo_percent == 0 && $oppose_num_of_demo_percent == 0) && ($support_num_of_repub_percent != 0 || $oppose_num_of_repub_percent != 0)){
	$dataPoints1 = array(
		array("label"=> " ", "y"=> $support_rate_of_demo_percent, "z"=>$support_num_of_demo_percent),
		array("label"=> "Republicans: $support_rate_of_repub_percent% Agree", "y"=> null),
	);
	$dataPoints2 = array(
		array("label"=> " ", "y"=> $oppose_rate_of_demo_percent, "z"=>$oppose_num_of_demo_percent),
		array("label"=> "Republicans: $support_rate_of_repub_percent% Agree", "y"=> null),
	);

	$dataPoints3 = array(
		array("label"=> " ", "y"=> null),
		array("label"=> "Republicans: $support_rate_of_repub_percent% Agree", "y"=> $support_rate_of_repub_percent, "z"=>$support_num_of_repub_percent)
	);

	$dataPoints4 = array(
		array("label"=> " ", "y"=> null),
		array("label"=> "Republicans: $support_rate_of_repub_percent% Agree", "y"=> $oppose_rate_of_repub_percent, "z"=>$oppose_num_of_repub_percent)
	);
}else if(($support_num_of_repub_percent == 0 && $oppose_num_of_repub_percent == 0) && ($support_num_of_demo_percent != 0 || $oppose_num_of_demo_percent != 0)){
	$dataPoints1 = array(
		array("label"=> "Democrats: $support_rate_of_demo_percent% Agree", "y"=> $support_rate_of_demo_percent, "z"=>$support_num_of_demo_percent),
		array("label"=> " ", "y"=> null),
	);
	$dataPoints2 = array(
		array("label"=> "Democrats: $support_rate_of_demo_percent% Agree", "y"=> $oppose_rate_of_demo_percent, "z"=>$oppose_num_of_demo_percent),
		array("label"=> " ", "y"=> null),
	);

	$dataPoints3 = array(
		array("label"=> "Democrats: $support_rate_of_demo_percent% Agree", "y"=> null),
		array("label"=> " ", "y"=> $support_rate_of_repub_percent, "z"=>$support_num_of_repub_percent)
	);

	$dataPoints4 = array(
		array("label"=> "Democrats: $support_rate_of_demo_percent% Agree", "y"=> null),
		array("label"=> " ", "y"=> $oppose_rate_of_repub_percent, "z"=>$oppose_num_of_repub_percent)
	);
}else{
	$dataPoints1 = array(
		array("label"=> null, "y"=> null, "x"=>null ),
		array("label"=> null, "y"=> null),
	);
	$dataPoints2 = array(
		array("label"=> null, "y"=> null, "x"=>null),
		array("label"=> null, "y"=> null),
	);

	$dataPoints3 = array(
		array("label"=> null, "y"=> null),
		array("label"=> null, "y"=> null, "x"=>null)
	);

	$dataPoints4 = array(
		array("label"=> null, "y"=> null),
		array("label"=> null, "y"=> null, "x"=>null)
	);
}
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
	theme: "light2",
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
		suffix: "%"
	},
	data: [
		{
			color:"#3357FF",
			type: "stackedColumn100",
			name: "Democrats Who Support",
			indexLabel: "{y}% Agree",
			indexLabelFontWeight: "bold",
			indexLabelFontSize: 15,
			indexLabelFontColor: "black",
			// showInLegend: true,
			dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
		},{
			color: "#E1F7FF",
			type: "stackedColumn100",
			name: "Democrats Who Oppose",
			// indexLabelPlacement: "inside",
			// showInLegend: true,
			indexLabel: "{y}% Disagree",
			indexLabelFontWeight: "bold",
			indexLabelFontSize: 15,
			indexLabelFontColor: "black",
			dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
		},{
			color: "rgb(191, 40, 0)",
			type: "stackedColumn100",
			name: "Republicans Who Support",
			indexLabel: "{y}% Agree",
			indexLabelFontWeight: "bold",
			indexLabelFontSize: 15,
			indexLabelFontColor: "black",
			dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
		},{
			color: "#FFCCBB",
			type: "stackedColumn100",
			name: "Republicans Who Oppose",
			indexLabel: "{y}% Disagree",
			indexLabelFontWeight: "bold",
			indexLabelFontSize: 15,
			indexLabelFontColor: "black",
			dataPoints: <?php echo json_encode($dataPoints4, JSON_NUMERIC_CHECK); ?>
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
   if (($support_num_of_demo_percent == 0 && $oppose_num_of_demo_percent == 0)
        && ($support_num_of_repub_percent == 0 && $oppose_num_of_repub_percent == 0)
        && $id_carrier != 23 && $id_carrier != 24) {
    echo '<div class="wrapper5" style="width:100%;">';
    echo 'Debug 1: ';
    var_dump($id_carrier);
  }
  else {
    echo '<div class="wrapper5">';
    echo 'Debug 2: ';
    var_dump($id_carrier);
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
  <div id="chartContainer" style="height: 350px; width: 50%; float: right;"></div>

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
