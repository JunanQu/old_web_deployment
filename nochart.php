<?php
// include('includes/header.php');
include('test2.php');
$dataPoints = array(
	array("y" => 100*$support_rate_of_demo, "label" => "Democrats" ),
	array("y" => 100*$support_rate_of_repub, "label" => "Republican" ),

);

?>
<!DOCTYPE HTML>
<html>
<head>
<link href="styles/all.css" rel="stylesheet" type="text/css"  />
<div class="no_chart_question_text">
<p >

</p>
</div>
<form action="nochart.php" method="post">
	<p class="question_text">
		Please click the link below that best expresses your response:
	</p>
<button class = "supportbutton" name="support" type="submit" value="support">Agree</button>
<button class = "opposebutton" name="oppose" type="submit" value="oppose">Disagree</button>
</form>

</head>
<div class="index-banner1">
	<div class="header-top">
		<div class="wrap">
			<h1> <?php
			$records = exec_sql_query($myPDO, "SELECT question_content FROM questions WHERE questions.id ='". $id_carrier."'")->fetch(PDO::FETCH_ASSOC);
			echo("Question ".$current_seq.". ".'"'.$records['question_content'].'"');
			?> </h1>
			<div class="clear"></div>
		 </div>
	</div>
</div>
<body>
</body>
</html>
