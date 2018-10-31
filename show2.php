<?php

include('test2.php');
var_dump(random_question_order_generator());
if (isset($_POST['sql'])) {
  $user_sql = $_POST['sql_input'];
  var_dump($user_sql);
  $a = exec_sql_query($myPDO, "$user_sql")->fetchAll();
  var_dump($a);
}
// $users = exec_sql_query($myPDO, "SELECT * FROM user ")->fetchAll();
// var_dump($users);
// // //
// $quesiton_dataset = exec_sql_query($myPDO, "SELECT * FROM user_question_world_answer ")->fetchAll();
// var_dump($quesiton_dataset);

// $world = exec_sql_query($myPDO, "SELECT * FROM world ")->fetchAll();
// var_dump($world);

// $question = exec_sql_query($myPDO, "SELECT * FROM questions")->fetchAll();
// var_dump($question);

// $a = random_question_order_generator();
// var_dump($a);

?>
