<?php
// include('includes/header.php');
include('test2.php');
include('proceed.php');
$preference = $_GET["preference"];
exec_sql_query($myPDO, "UPDATE user_question_world_answer SET user_yes_no = '$preference' WHERE user_id = '$current_user' AND question_id = '$id_carrier'");
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
<link href="styles/all.css" rel="stylesheet" type="text/css"  />
<div class="index-banner1">
	<div class="header-top">
		<div class="wrap">
			<h1 class="content_q"><?php
			if ($id_carrier == 23){
				echo "PRACTICE QUESTION: The Supreme Court has gone too far in liberalizing access to abortion." ;
			}else if ($id_carrier == 24) {
				echo "PRACTICE QUESTION: The Affordable Care Act ('Obamacare') should be strengthened, not weakened or abolished." ;
			}else{
			$records = exec_sql_query($myPDO, "SELECT question_content,id FROM questions WHERE questions.id ='". $id_carrier."'")->fetch(PDO::FETCH_ASSOC);
			if($records){
				echo("Question ".$current_seq_by_count.". ".'"'.$records['question_content'].'"');
				}
			};
      ?></h1>
			<h2> </h2>
			<div class="clear_chart"></div>
		 </div>
	</div>
</div>

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
			echo "text: 'Percent who agree, by political party',";
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
	labelFontSize: 25
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
</head>
<body>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



<?php
if (($support_num_of_demo_percent == 0 && $oppose_num_of_demo_percent == 0) && ($support_num_of_repub_percent == 0 && $oppose_num_of_repub_percent == 0)) {
  echo '<div class="wrapper5" style="width:100% !important;">';
}
else {
  echo '<div class="wrapper5">';
}
if($id_carrier == 24 || $id_carrier == 23){
  if (($support_num_of_demo_percent == 0 && $oppose_num_of_demo_percent == 0) && ($support_num_of_repub_percent == 0 && $oppose_num_of_repub_percent == 0)) {
  echo '<form class="form_i" style="width:100% !important;" action="game_start.php" method="post">';
  }else{
	echo'<form class="form_i" action="game_start.php" method="post">';
  }
}else{
  if (($support_num_of_demo_percent == 0 && $oppose_num_of_demo_percent == 0) && ($support_num_of_repub_percent == 0 && $oppose_num_of_repub_percent == 0)) {
    echo '<form class="form_i" style="width:100% !important;" action="question.php?preference=1" method="post">';
  }else{
  echo '<form class="form_i" action="question.php?preference=1" method="post">';
  }
}
  // }
?>
    <p class="question_text">
      Next, we would like to know your own individual opinion.
    </p>
    <p class="question_text" style="display: none;" id="show1">
      As a <?php echo "$user_political_id" ?>, would you be more likely to agree or disagree with this statement?
    </p>
    <button style="display: none; margin-top: 15%;"  id="support" name="oppose" type="submit" value="oppose">
      I <span class="italic">disagree</span>.
    </button>
    <button  style="display: none; margin-top: 15%;" id="oppose" name="support" type="submit" value="support">
      I <span class="italic">agree</span>.
		</button>
</form>
</div>
<div id="chartContainer" style="height: 350px; width: 50%; float: right;"></div>
</body>

<script>
$(document).ready(function(){
    $("#show1").delay(3000).fadeIn();
    $("#support").delay(3000).fadeIn();
    $("#oppose").delay(3000).fadeIn();
});

// window.onbeforeunload = function() {
//     return 'Are you sure you want to refresh? If you reload the page, your ' +
//         'changes may not be saved, which may leave this session incomplete and ' +
//         'discredit your work in previous questions.';
// };
</script>

<script src="//code.jquery.com/jquery-1.12.1.min.js"></script>
<script src="script/jquery.backDetect.js"></script>
<script src="script/back_button.js"></script>
<script src="script/canvasjs.min.js"></script>
</html>
