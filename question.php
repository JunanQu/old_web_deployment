<?php
include('test2.php');

// if (!$num_of_users<=1 && !(($support_num_of_demo_percent == 0 && $oppose_num_of_demo_percent == 0))) {
//
// if ($support_rate_of_demo_percent >= 95){
//   $support_rate_of_demo_percent = rand(95,98);
//   $oppose_rate_of_demo_percent = 100-$support_rate_of_demo_percent;
// }
// if ($support_rate_of_demo_percent <= 5){
//   $support_rate_of_demo_percent = rand(1,5);
//   $oppose_rate_of_demo_percent = 100-$support_rate_of_demo_percent;
// }
// }
// if(!($support_num_of_repub_percent == 0 && $oppose_num_of_repub_percent == 0)) {
//   if($support_rate_of_repub_percent >= 95){
//     $support_rate_of_repub_percent = rand(95,98);
//     $oppose_rate_of_repub_percent = 100 - $support_rate_of_repub_percent;
//   }
//   if($support_rate_of_repub_percent <= 5){
//     $support_rate_of_repub_percent = rand(1,5);
//     $oppose_rate_of_repub_percent = 100 - $support_rate_of_repub_percent;
//   }
// }
$preference = $_GET["preference"];

$dominant_party = '';
$nondominant_party = '';

var_dump( $support_rate_of_demo, $support_rate_of_repub);

if($id_carrier==23){
  $dominant_party = 'Republicans';
  $nondominant_party = 'Democrats';
}else if($id_carrier==24){
  $dominant_party = 'Democrats';
  $nondominant_party = 'Republicans';
}else if ($demo_who_support > $republican_who_support) {
  // If more democrats support.
  $dominant_party = 'Democrats';
  $nondominant_party = 'Republicans';
} else if ($demo_who_support < $republican_who_support) {
  // If more republicans support.
  $dominant_party = 'Republicans';
  $nondominant_party = 'Democrats';
} else {
  // If equal.
  $dominant_party = 'Neither';
  $nondominant_party = 'Neither';
}

if ($dominant_party == 'Republicans'){
  $font_color = 'Red';
}else if ($dominant_party == 'Democrats'){
  $font_color = 'Blue';
}else {
  $font_color = 'Purple';
}
exec_sql_query($myPDO, "UPDATE user_question_world_answer SET font_color = '$font_color' WHERE user_id = '$current_user' AND question_id = '$id_carrier'");



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

.cont {
  margin-bottom: 30px;
}

.reasons_question {
  max-width: 500px;
  margin-left: calc(50% - 250px);
}
</style>
<link href="styles/question_pages.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<!-- ================ BANNER ================ -->
	<div class="index-banner1">
		<div class="header-top">
			<div class="wrap">
				<h1 class="content_q <?php echo $dominant_party ?>"><?php
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
	      ?></h1>
				<div class="clear_chart"></div>
			 </div>
		</div>
	</div>

	<!-- ================ BODY ================ -->
<div class="wrapper5" style="width:100% !important;">
  <div class="cont">
    <p>
      <?php
      if($all_demo_in_world == 0 && $all_republican_in_world == 0){
        if($id_carrier==24){
          echo '<span class="Democrats">Democrats</span> are more likely than <span class="Republicans">Republicans</span> to agree with this statement';
        }
        else if($id_carrier==23){
          echo '<span class="Republicans">Republicans</span> are more likely than <span class="Democrats">Democrats </span> to agree with this statement';
        }
        else if ($dominant_party=='Neither') {
          echo '<span class="Democrats">Democrats</span> and <span class="Republicans">Republicans</span> are equally likely to agree with this statement.';
        } else {
          echo '<span class="'.$dominant_party.'">'.$dominant_party.'</span> are more likely than <span class="'.$nondominant_party.'">'.$nondominant_party.'</span> to agree with this statement.';
        }
      }else{
        if($id_carrier==24){
          echo 'So far, <span class="Democrats">Democrats</span> are more likely than <span class="Republicans">Republicans</span> to agree with this statement';
        }
        else if($id_carrier==23){
          echo 'So far. <span class="Republicans">Republicans</span> are more likely than <span class="Democrats">Democrats </span> to agree with this statement';
        }
        else if ($dominant_party=='Neither') {
          echo 'So far, <span class="Democrats">Democrats</span> and <span class="Republicans">Republicans</span> are equally likely to agree with this statement.';
        } else {
          echo 'So far, <span class="'.$dominant_party.'">'.$dominant_party.'</span> are more likely than <span class="'.$nondominant_party.'">'.$nondominant_party.'</span> to agree with this statement.';
        }
      }
      ?>
    </p>
    <br>
    <p>
      Please take a few moments to read the question carefully and think about
      why this might be the case.
    </p>
  </div>
  <?php
  if ($user_political_id == "Democrat"){
    $user_political_id_possessive = "Democratic";
    $user_opposie_party = "Republican";
  }else{
    $user_political_id_possessive = "Republican";
    $user_opposie_party = "Democrat";
  }

  ?>
  <div class="cont initially_hide">
    <p>
      Pick the reason a <?php echo "$user_political_id"?>
       might answer differently than a <?php echo "$user_opposie_party"?>.
    </p>
		<div class="reasons_question">
			<form action="party_prediction_question.php?preference=1" method="post">
        <!-- IDEOLOGY -->
				<div class="reason">
					<input name="ideology" type="submit" class="reason_button" value="ideology" disabled>
					</input>
					<div class="desc">
						Because the issue involves <?php echo "$user_political_id_possessive" ?> party
            <span class="underline">values</span>.
					</div>
				</div>

        <!-- HISTORY -->
				<div class="reason">
					<input name="history" type="submit" class="reason_button" value="history" disabled>
					</input>
					<div class="desc">
            Because the issue involves <span class="underline">historical</span> <?php echo "$user_political_id_possessive" ?> party
						positions.
          </div>
				</div>

        <!-- POPULARITY -->
				<div class="reason">
					<input name="popularity" type="submit" class="reason_button" value="popularity" disabled>
					</input>
					<div class="desc">
            Because the issue is important to the <?php echo "$user_political_id_possessive" ?>
						party’s <span class="underline">core political base</span>.
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

function hideEl_(elToHide, opt_harshTransition, opt_fadeTo) {
  let time = !!opt_harshTransition ? 0 : 1000;

  elToHide.each(function(ind) {
    let self = $(this);
    if (self.hasClass('opinion_response')) {
      self.prop('disabled', true);
    }
    self.fadeTo(time, opt_fadeTo ? opt_fadeTo : 0);
  });
}

function enableQuestion() {
	$(".reasons_question").fadeTo(500, 1);
	$(".reason").addClass('enabled');
	$(':input[type="submit"]').prop('disabled', false);

  showEl_($('.initially_hide'));
}
</script>
<script src="script/canvasjs.min.js"></script>

</html>
