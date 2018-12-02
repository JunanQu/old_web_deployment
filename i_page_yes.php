<?php
include('test2.php');

$support_num_of_demo_percent =count(exec_sql_query($myPDO, "SELECT * FROM user_question_world_answer JOIN user ON user.mturk = user_question_world_answer.user_id WHERE (question_id = '$previous_one' AND user_political_stand = 'agree' AND  world_id = '$current_user_world_id' AND (user.political_stand = 'Democrats' OR user.political_stand = 'strong Democrats'))")->fetchAll());
$oppose_num_of_demo_percent =count(exec_sql_query($myPDO, "SELECT * FROM user_question_world_answer JOIN user ON user.mturk = user_question_world_answer.user_id WHERE (question_id = '$previous_one' AND user_political_stand = 'disagree' AND world_id = '$current_user_world_id' AND (user.political_stand = 'Democrats' OR user.political_stand = 'strong Democrats'))")->fetchAll());

$support_num_of_repub_percent =count(exec_sql_query($myPDO, "SELECT * FROM user_question_world_answer JOIN user ON user.mturk = user_question_world_answer.user_id WHERE (question_id = '$previous_one' AND user_political_stand = 'agree'  AND world_id = '$current_user_world_id' AND user.political_stand = 'Republicans')")->fetchAll());
$oppose_num_of_repub_percent =count(exec_sql_query($myPDO, "SELECT * FROM user_question_world_answer JOIN user ON user.mturk = user_question_world_answer.user_id WHERE (question_id = '$previous_one' AND user_political_stand = 'disagree'  AND world_id = '$current_user_world_id' AND user.political_stand = 'Republicans')")->fetchAll());

$dominant_party = '';
$nondominant_party = '';
if($id_carrier==23){
  $dominant_party = 'Republicans';
  $nondominant_party = 'Democrats';
}else if($id_carrier==24){
  $dominant_party = 'Democrats';
  $nondominant_party = 'Republicans';
}
else if ($support_num_of_demo_percent > $support_num_of_repub_percent) {
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
        if ($id_carrier == 23) {
          echo "<span style='color:black'>PRACTICE QUESTION: </span>";
          echo "<span style='color:red'>The Supreme Court has gone too far in liberalizing access to abortion.</span>";
        } else if ($id_carrier == 24) {
          echo "<span style='color:black'>PRACTICE QUESTION: </span>";
          echo "<span style='color:blue'>The Affordable Care Act ('Obamacare') should be strengthened, not weakened or abolished.</span" ;
        } else {
          $records = exec_sql_query($myPDO,
              "SELECT question_content FROM questions WHERE questions.id ='". $id_carrier."'")->fetch(PDO::FETCH_ASSOC);
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
    echo $form_universal_tag, 'style="width:100% !important;" action="game_start.php" method="post">';
}else{
  echo $form_universal_tag, 'style="width:100% !important;" action="question.php?preference=1" method="post">';

}
?>
    <p class="question_text initially_show">
      Finally, we would like to know your own individual opinion.
    </p>

    <p class="question_text initially_show">
      As a <span class="<?php echo $user_political_id."s" ?>"><?php echo "$user_political_id" ?></span>,
      <br/>
      do you agree or disagree with this statement?
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
const QUESTION_FADE_TIME = 0; // Number of seconds it should take for Q to appear.

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
