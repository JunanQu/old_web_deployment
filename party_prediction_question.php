<?php
include('test2.php');
include('proceed.php');
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

</head>
<body>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



<?php
echo '<div class="wrapper5" style="width:75% !important; margin:10%; margin-top:0;">';


$form_universal_tag = '<form class="form_i" id="question_box" ';

if($id_carrier == 24 || $id_carrier == 23){
  if (($current_user_world_id==1))
    echo $form_universal_tag, 'style="width:100% !important;" action="game_start.php" method="post">';
}else{
    echo $form_universal_tag, 'style="width:100% !important;" action="i_page_yes.php?preference=1" method="post">';
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
<?php
if (((($support_num_of_demo_percent == 0 && $oppose_num_of_demo_percent == 0) && ($support_num_of_repub_percent == 0 && $oppose_num_of_repub_percent == 0))||($current_user_world_id==1))&&($id_carrier!=23&&$id_carrier!=24)) {
}else {
  echo ('<div id="chartContainer" style="height: 350px; width: 50%; float: right;"></div>');
}
?>
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
<footer>
  <p>*$100 to the player with the most accurate predictions, based on results from a previously conducted survey (to be divided equally in case of ties)
</p>
</footer>
<script src="//code.jquery.com/jquery-1.12.1.min.js"></script>
<script src="script/jquery.backDetect.js"></script>
<script src="script/back_button.js"></script>
</html>
