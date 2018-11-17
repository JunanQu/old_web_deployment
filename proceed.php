<?php

// if($id_carrier == 23|| $id_carrier == 24) {
// if (isset($_POST['ideology'])){
//     exec_sql_query($myPDO, "INSERT INTO user_question_world_answer (user_id, world_id, question_id, reason) VALUES ('$current_user', '$current_user_world_id', '$id_carrier', 'ideology') ");
//   // exec_sql_query($myPDO, "UPDATE user_question_world_answer SET user_which_party = 'Democrats'  WHERE user_id = '$current_user' AND question_id = '$id_carrier'");
// }elseif (isset($_POST['history'])){
//   exec_sql_query($myPDO, "INSERT INTO user_question_world_answer (user_id, world_id, question_id, reason) VALUES ('$current_user', '$current_user_world_id', '$id_carrier', 'history') ");
//   // exec_sql_query($myPDO, "UPDATE user_question_world_answer SET user_which_party = 'Republicans'  WHERE user_id = '$current_user'AND question_id = '$id_carrier'");
// }elseif (isset($_POST['popularity'])){
//   exec_sql_query($myPDO, "INSERT INTO user_question_world_answer (user_id, world_id, question_id, reason) VALUES ('$current_user', '$current_user_world_id', '$id_carrier', 'popularity') ");
//   // exec_sql_query($myPDO, "UPDATE user_question_world_answer SET user_which_party = 'Republicans'  WHERE user_id = '$current_user'AND question_id = '$id_carrier'");
// }
// }else{
//       $check_if_answered = exec_sql_query($myPDO, "SELECT user_response FROM user_question_world_answer WHERE (user_id LIKE '$current_user' AND question_id LIKE '$previous_one')")->fetchAll();
//       $check_if_current_answered = exec_sql_query($myPDO, "SELECT user_response FROM user_question_world_answer WHERE (user_id LIKE '$current_user' AND question_id LIKE '$id_carrier')")->fetchAll();
//
//       // var_dump($check_if_answered[0]['user_response']);
//       if (($check_if_answered[0]['user_response'])!= null){
//           if (isset($_POST['ideology'])){
//               exec_sql_query($myPDO, "INSERT INTO user_question_world_answer (user_id, world_id, question_id, reason) VALUES ('$current_user', '$current_user_world_id', '$id_carrier', 'ideology') ");
//             // exec_sql_query($myPDO, "UPDATE user_question_world_answer SET user_which_party = 'Democrats'  WHERE user_id = '$current_user' AND question_id = '$id_carrier'");
//           }elseif (isset($_POST['history'])){
//             exec_sql_query($myPDO, "INSERT INTO user_question_world_answer (user_id, world_id, question_id, reason) VALUES ('$current_user', '$current_user_world_id', '$id_carrier', 'history') ");
//             // exec_sql_query($myPDO, "UPDATE user_question_world_answer SET user_which_party = 'Republicans'  WHERE user_id = '$current_user'AND question_id = '$id_carrier'");
//           }elseif (isset($_POST['popularity'])){
//             exec_sql_query($myPDO, "INSERT INTO user_question_world_answer (user_id, world_id, question_id, reason) VALUES ('$current_user', '$current_user_world_id', '$id_carrier', 'popularity') ");
//             // exec_sql_query($myPDO, "UPDATE user_question_world_answer SET user_which_party = 'Republicans'  WHERE user_id = '$current_user'AND question_id = '$id_carrier'");
//           }
//         }
// }
?>
