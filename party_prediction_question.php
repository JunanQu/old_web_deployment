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
if(
  $num_of_users <= 1 || $current_user_world_id == 1
  || ((($support_num_of_demo_percent == 0 && $oppose_num_of_demo_percent == 0) && ($support_num_of_repub_percent == 0 && $oppose_num_of_repub_percent == 0)))
  || ($id_carrier!=23&&$id_carrier!=24)
  ){
  echo "213";
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
}else if ($id_carrier == 21){
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
}else if($id_carrier == 22){
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
  // var_dump($support_num_of_demo_percent,$oppose_num_of_demo_percent,$support_num_of_repub_percent,$oppose_num_of_repub_percent);
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
		array("label"=> " ", "y"=> null, "z"=>$support_num_of_repub_percent)
	);

	$dataPoints4 = array(
		array("label"=> "Democrats: $support_rate_of_demo_percent% Agree", "y"=> null),
		array("label"=> " ", "y"=> null, "z"=>$oppose_num_of_repub_percent)
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
<link href="styles/all.css" rel="stylesheet" type="text/css" />
<link href="styles/question_pages.css" rel="stylesheet" type="text/css" />

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
		}else if (($support_num_of_demo_percent == 0 && $oppose_num_of_demo_percent == 0) || ($support_num_of_repub_percent == 0 && $oppose_num_of_repub_percent == 0)){
			echo "text: 'So far, all the participants have been from the ".$oppo_stand." Party'";
		}else{
			echo "text: 'Percent who agree, by political party',";
		}?>
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
			indexLabelFontSize: 12,
			indexLabelFontColor: "white",
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
			indexLabelFontSize: 12,
			indexLabelFontColor: "black",
			dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
		},{
			color: "rgb(221, 12, 12)",
			type: "stackedColumn100",
			name: "Republicans Who Support",
			indexLabel: "{y}% Agree",
			indexLabelFontWeight: "bold",
			indexLabelFontSize: 12,
			indexLabelFontColor: "white",
			dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
		},{
			color: "rgb(255, 144, 144)",
			type: "stackedColumn100",
			name: "Republicans Who Oppose",
			indexLabel: "{y}% Disagree",
			indexLabelFontWeight: "bold",
			indexLabelFontSize: 12,
			indexLabelFontColor: "black",
			dataPoints: <?php echo json_encode($dataPoints4, JSON_NUMERIC_CHECK); ?>
		}
	]
});
chart.render();
$(window).resize(function() {

    for(var i = 0; i < chart.options.axisX.labelFontSize; i++){
				chart.options.axisX.labelFontSize = Math.min(20, Math.max(12, $("#chartContainer").width() /15));

    }
    chart.render();
});
}

</script>
</head>
<body>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



<?php
if ((($support_num_of_demo_percent == 0 && $oppose_num_of_demo_percent == 0) && ($support_num_of_repub_percent == 0 && $oppose_num_of_repub_percent == 0))||($current_user_world_id==1)) {
  echo '<div class="wrapper5" style="width:75% !important; margin:10%; margin-top:0;">';
}
else {
  echo '<div class="wrapper5">';
}

$form_universal_tag = '<form class="form_i" id="question_box" ';

if($id_carrier == 24 || $id_carrier == 23){
  if ((($support_num_of_demo_percent == 0 && $oppose_num_of_demo_percent == 0) && ($support_num_of_repub_percent == 0 && $oppose_num_of_repub_percent == 0))||($current_user_world_id==1))
  {
    echo $form_universal_tag, 'style="width:100% !important;" action="game_start.php" method="post">';
  }else
  {
	echo $form_universal_tag, 'action="game_start.php" method="post">';
  }
}else{
  if ((($support_num_of_demo_percent == 0 && $oppose_num_of_demo_percent == 0) && ($support_num_of_repub_percent == 0 && $oppose_num_of_repub_percent == 0))||($current_user_world_id==1)) {
    echo $form_universal_tag, 'style="width:100% !important;" action="i_page_yes.php?preference=1" method="post">';
  }else{
  echo $form_universal_tag, 'action="i_page_yes.php?preference=1" method="post">';
  }
}
?>
    <p class="question_text initially_show">
      For an opportunity to win* $100:
    </p>
    <p class="question_text initially_hide">
      Which party do you predict is more likely to agree with this opinion?
    </p>
    <br/><br/>

    <!-- This is a hidden field that is used to pass data to the back-end. -->
    <input type="hidden" name="user_response" id="user_response" >
    <input type="hidden" name="user_time" id="user_time" >

    <!-- Buttons for user to choose between. This will auto-populate the hidden
         field on the client side. -->
    </fieldset>
    <button id="democrats" class="opinion_response initially_hide" value="democrats" disabled>
        Democrats
    </button>
    <button id="republicans" class="opinion_response initially_hide" value="republicans" disabled>
        Republicans
    </button>
</form>
</div>
<div id="chartContainer" style="height: 350px; width: 50%; float: right;"></div>
</body>

<script>
let WAS_SUBMITTED = false;
let CAN_SUBMIT = false;
var USER_START_TIME = -1;
var USER_END_TIME = -1;
const QUESTION_FADE_TIME = 4; // Number of seconds it should take for Q to appear.

$(document).ready(function() {
    USER_START_TIME = performance.now();
    console.log('\n\n\n\n\n\n\n\n\n\n============================\n NEW PAGE\n============================');
    setTimeout(fadeNextQuestion, QUESTION_FADE_TIME*1000, $('.initially_hide'), $('.initially_show'));
});

// Listens for submit event only once.
$('.opinion_response').click((event) => {
    console.log('Click registered!');
    event.preventDefault();
    USER_END_TIME = performance.now();
    let responseVal = event.target.id;
    let timeVal = getDelta_(USER_START_TIME, USER_END_TIME);

    if (CAN_SUBMIT && !WAS_SUBMITTED && responseVal != '') {
        // Populate hidden input field that stores 'agree' or 'disagree'.
        $('.user_response').val(responseVal);
        $('.user_time').val(timeVal);
        document.getElementById('user_response').value = responseVal;
        document.getElementById('user_time').value = timeVal;

        console.log('Populating response with ' + responseVal);
        console.log('Populating time with ' + timeVal);

        // Submit the form.
        $('form.form_i').submit();

        // Disable buttons to disallow users from submitting multiple times.
        hideEl_($('.opinion_response'), true);
        WAS_SUBMITTED = true;
    }
});

$('form.form_i').on('submit', function(event) {
    console.log('SUBMITTED!!!', event);
});

function fadeNextQuestion(elToShow, elToHide) {
    CAN_SUBMIT = true; // Marks that user can submit.

    showEl_(elToShow); // Makes hidden elements fully visible.
}

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
        self.fadeTo(time, 0.3);
    });
}

function getDelta_(startTime_ms, endTime_ms) {
    if (startTime_ms < 0 || endTime_ms < 0) {
        return '-1';
    }
    let s = (endTime_ms - startTime_ms) / 1000;
    return s.toFixed(4);
}

</script>

<script src="//code.jquery.com/jquery-1.12.1.min.js"></script>
<script src="script/jquery.backDetect.js"></script>
<script src="script/back_button.js"></script>
<script src="script/canvasjs.min.js"></script>
</html>
