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

// ============================== VAR DUMP ==============================
// var_dump($support_num_of_demo_percent,$oppose_num_of_demo_percent,$support_num_of_repub_percent,$oppose_num_of_repub_percent);

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
<link href="styles/all.css" rel="stylesheet" type="text/css" />
<link href="styles/question_pages.css" rel="stylesheet" type="text/css" />

<div class="index-banner1">
	<div class="header-top">
		<div class="wrap">
			<h1 class="content_q <?php echo $dominant_party ?>">
        <?php
    			if ($id_carrier == 23){
    				echo "PRACTICE QUESTION: The Supreme Court has gone too far in liberalizing access to abortion." ;
    			} else if ($id_carrier == 24) {
    				echo "PRACTICE QUESTION: The Affordable Care Act ('Obamacare') should be strengthened, not weakened or abolished." ;
    			} else {
    		    $records = exec_sql_query($myPDO, "SELECT question_content,id FROM questions WHERE questions.id ='". $id_carrier."'")->fetch(PDO::FETCH_ASSOC);
      			if ($records) {
      				// echo("Question ".$current_seq_by_count.". ".'"'.$records['question_content'].'"');
              // Removes the question number in the title.
              echo('"'.$records['question_content'].'"');
    				}
    			};
        ?>
      </h1>
			<h2></h2>
			<div class="clear_chart"></div>
		 </div>
	</div>
</div>
</head>
<body>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<div class="wrapper5" style="width:75% !important; margin:10%; margin-top:0;">

<?php
$form_universal_tag = '<form class="form_i" id="question_box" ';

if($id_carrier == 24 || $id_carrier == 23){
  if (($current_user_world_id==1))
  {
    echo $form_universal_tag, 'style="width:100% !important;" action="game_start.php" method="post">';
  }else
  {
	echo $form_universal_tag, 'action="game_start.php" method="post">';
  }
}else{
  if ((($support_num_of_demo_percent == 0 && $oppose_num_of_demo_percent == 0) && ($support_num_of_repub_percent == 0 && $oppose_num_of_repub_percent == 0))||($current_user_world_id==1)) {
    // echo $form_universal_tag, 'style="width:100% !important;" action="i_page_yes.php?preference=1" method="post">';
    echo $form_universal_tag, 'style="width:100% !important;" action="question.php?preference=1" method="post">';
  }else{
    // echo $form_universal_tag, 'action="i_page_yes.php?preference=1" method="post">';
    echo $form_universal_tag, 'action="question.php?preference=1" method="post">';
  }
}
?>
    <p class="question_text initially_show">
      Please take a few moments to read the statement carefully and think about your response.
    </p>
    <p class="question_text initially_hide">You may now answer the question.</p>

    <p class="question_text initially_hide">
      As a <?php echo "$user_political_id" ?>, do you agree or disagree with this statement?
    </p>
    <br/><br/>

    <!-- This is a hidden field that is used to pass data to the back-end. -->
    <input type="hidden" name="user_response_agreement" id="user_response_agreement" >
    <input type="hidden" name="user_time_agreement" id="user_time_agreement" >

    <!-- Buttons for user to choose between. This will auto-populate the hidden
         field on the client side. -->
    </fieldset>
    <button id="agree" class="opinion_response initially_hide <?php echo $dominant_party ?>_bkg" value="agree" disabled>
        I agree.
    </button>
    <button id="disagree" class="opinion_response initially_hide <?php echo $nondominant_party ?>_bkg" value="disagree" disabled>
        I disagree.
    </button>
</form>
</div>
<?php
if (((($support_num_of_demo_percent == 0 && $oppose_num_of_demo_percent == 0) && ($support_num_of_repub_percent == 0 && $oppose_num_of_repub_percent == 0))||($current_user_world_id==1))&&($id_carrier!=23&&$id_carrier!=24)) {
}else {
  echo ('<div id="chartContainer" style="height: 350px; width: 50%; float: right;"></div>');
}
?></body>

<script>
let WAS_SUBMITTED = false;
let CAN_SUBMIT = false;
var USER_START_TIME = -1;
var USER_END_TIME = -1;
const QUESTION_FADE_TIME = 7; // Number of seconds it should take for Q to appear.

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
        $('.user_response_agreement').val(responseVal);
        $('.user_time_agreement').val(timeVal);
        document.getElementById('user_response_agreement').value = responseVal;
        document.getElementById('user_time_agreement').value = timeVal;

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
