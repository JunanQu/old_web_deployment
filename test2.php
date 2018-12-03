<?php

    $world_array=array(1,2,3,4,5,6,7,8,9,10);
    shuffle($world_array);

    if(count($world_array) == 0){
      $world_array=[1,2,3,4,5,6,7,8,9,10];
    }

    $host = 'thirdtest.camwsondhmqr.us-east-2.rds.amazonaws.com';
    $db   = 'ebdb';
    $user = 'thirdtest';
    $pass = 'Qja1998+0325';
    $port = '3306';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;port=$port;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $myPDO = new PDO($dsn, $user, $pass, $opt);
    $myPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $world_data = exec_sql_query($myPDO, "SELECT * FROM world")->fetchAll();
    if (count($world_data)<1){
      $world_array=array(1,2,3,4,5,6,7,8,9,10);
      shuffle($world_array);
      // ($world_array);
      foreach ($world_array as $world) {
        // ($world);
        $a = exec_sql_query($myPDO, "INSERT INTO world (id) VALUES('$world')");
        // ($a);
      }

    }




    function random_question_order_generator(){
      $array = [];

      while( count($array) < 20 ){
        $rand = mt_rand(1,20);
        $array[$rand] = $rand;
      }
      $random_PQ = rand(23,24);
      $res = array_splice($array,0,0,$random_PQ);
      array_push($array, 25);

      return $array;
    }

    function random_world_generator(){
      $rand = mt_rand(1,9);
      return $rand;
    }


    $new_question_order=random_question_order_generator();
    $new_question_order = implode(",",$new_question_order);



    function exec_sql_query($myPDO, $sql, $params = array()) {
      try{
        $query = $myPDO->prepare($sql);
        if ($query and $query->execute($params)) {
          return $query;
      }

    } catch (PDOException $exception) {
      handle_db_error($exception);
      }
    }

    function handle_db_error($exception) {
    }


    function check_login() {
      global $myPDO;
      global $current_user;
      // ($current_user, $_COOKIE["session"]);
      if (isset($_COOKIE["session"])) {
        $session = $_COOKIE["session"];

        $sql = "SELECT * FROM user WHERE session ='$session'";
        $records = exec_sql_query($myPDO, $sql)->fetch(PDO::FETCH_ASSOC);;
        if ($records) {
          $user = $records['mturk'];
          return $user;
        }
      }
      return NULL;
    }

    function log_in($name,$mturk){
      global $world_array;
      global $myPDO;
      global $current_user;
      global $new_question_order;
      $current_user = filter_input(INPUT_POST, 'mTurk_code', FILTER_SANITIZE_STRING);
      if (isset($_POST["login"])) {
          $user_mTurk_code = filter_input(INPUT_POST, 'mTurk_code', FILTER_SANITIZE_STRING);
          $full_list_of_users = exec_sql_query($myPDO, "SELECT mturk FROM user")->fetchAll();
          $reorganized_users=array();
          foreach ($full_list_of_users as $a){
            array_push($reorganized_users,$a["mturk"]);
          };
              if (in_array($user_mTurk_code,$reorganized_users)){

              $session = exec_sql_query($myPDO, "SELECT session FROM user WHERE mturk = '". $user_mTurk_code. "'")->fetch(PDO::FETCH_ASSOC);

              setcookie("session", $session['session'], time()+3600);
              $_COOKIE["session"] = $session['session'];

            check_login();
            return $current_user= $user_mTurk_code;
          }else{
                $current_user = filter_input(INPUT_POST, 'mTurk_code', FILTER_SANITIZE_STRING);
                $user_mTurk_code = filter_input(INPUT_POST, 'mTurk_code', FILTER_SANITIZE_STRING);
                // $user_political = $_POST['political_stand'];
                $_SESSION['login_user']= $user_mTurk_code;
                // $result = exec_sql_query($myPDO, "INSERT INTO user (mturk, political_stand, question_id_sequence, sequential_number) VALUES ('$user_mTurk_code', '$user_political', '$new_question_order', 1)");
                $result = exec_sql_query($myPDO, "INSERT INTO user (mturk, question_id_sequence, sequential_number) VALUES ('$user_mTurk_code', '$new_question_order', 0)");
                $session = uniqid();
                // ($session);
                $records = exec_sql_query($myPDO, "UPDATE user SET session = '". $session. "' WHERE  user.mturk = '". $current_user. "'")->fetch(PDO::FETCH_ASSOC);
                $session = exec_sql_query($myPDO, "SELECT session FROM user WHERE mturk = '". $user_mTurk_code. "'")->fetch(PDO::FETCH_ASSOC);

                setcookie("session", $session['session'], time()+3600);


                $world_data = exec_sql_query($myPDO, "SELECT * FROM world")->fetchAll();
                $world_data = $world_data[0]['id'];
                // $world = array_pop($world_array);
                $world = $world_data;
                exec_sql_query($myPDO, "DELETE FROM world LIMIT 1 ");
                // exec_sql_query($myPDO, "UPDATE user SET world = '$world' WHERE mturk = '". $current_user. "'");
                exec_sql_query($myPDO, "UPDATE user SET world = 5 WHERE mturk = '". $current_user. "'");
                $current_user= $user_mTurk_code;
                // ($current_user);
                check_login();
                return $current_user;
          }
        }
      }

      function check_question_id(){
        global  $myPDO;
        global $current_user;
        if($current_user){

        $records = exec_sql_query($myPDO, "SELECT mturk, question_id_sequence FROM user WHERE mturk='". $current_user. "'")->fetch(PDO::FETCH_ASSOC);

        $records2 = exec_sql_query($myPDO, "SELECT question_id FROM user_question_world_answer  WHERE user_id='". $current_user. "'")->fetchAll();

        $A = explode(",",$records["question_id_sequence"]);
        $B = count($records2);

        $C = $A[$B];

        exec_sql_query($myPDO, "UPDATE user SET current_question = '". $C. "' WHERE user.mturk = '". $current_user. "'");
        if($records){
        return $id_carrier=$C;
      }else{
        return null;
      }
      }
    }


      if (isset($_POST['login'])) {
        global $myPDO;
        $username = filter_input(INPUT_POST, 'full_name', FILTER_SANITIZE_STRING);
        $username = trim($username);
        $password = htmlspecialchars(filter_input(INPUT_POST, 'mTurk_code', FILTER_SANITIZE_STRING));
        $current_user = log_in($username, $password);
        $previous_one = get_previous_one();
        $id_carrier = check_question_id();
        $current_user_world_id = exec_sql_query($myPDO, "SELECT world FROM user WHERE mturk = '". $current_user. "'")->fetch(PDO::FETCH_ASSOC);
        $current_user_world_id = $current_user_world_id['world'];
        $current_seq = exec_sql_query($myPDO, "SELECT sequential_number FROM user WHERE mturk LIKE '$current_user'")->fetchAll();
        $current_seq = $current_seq[0]['sequential_number'];
        if (isset($_POST['support'])){
          global $myPDO;
          $current_seq = exec_sql_query($myPDO, "SELECT sequential_number FROM user WHERE mturk LIKE '$current_user'")->fetchAll();
          // ($current_seq[0]['sequential_number']);
          $current_seq = $current_seq[0]['sequential_number'] + 1;
          exec_sql_query($myPDO, "UPDATE user SET sequential_number = ('$current_seq') WHERE mturk LIKE '$current_user'");

          $user_answer = "support";
          exec_sql_query($myPDO, "UPDATE user_question_world_answer SET user_response = '$user_answer' WHERE question_id = '$previous_one' AND user_id = '$current_user'");
          $current_seq = exec_sql_query($myPDO, "SELECT sequential_number FROM user WHERE mturk LIKE '$current_user'")->fetchAll();
          if ($current_seq){
          $current_seq = $current_seq[0]['sequential_number'];
          }
          $previous_one = get_previous_one();
          $current_user = check_login();
          $id_carrier = check_question_id();
        }

        if (isset($_POST['oppose'])){
          global $myPDO;
          $current_seq = exec_sql_query($myPDO, "SELECT sequential_number FROM user WHERE mturk LIKE '$current_user'")->fetchAll();
          // ($current_seq[0]['sequential_number']);
          $current_seq = $current_seq[0]['sequential_number'] + 1;
          exec_sql_query($myPDO, "UPDATE user SET sequential_number = ('$current_seq') WHERE mturk LIKE '$current_user'");

          $user_answer = "oppose";

          // ($id_carrier);
          $a=exec_sql_query($myPDO, "UPDATE user_question_world_answer SET user_response = '$user_answer' WHERE question_id = '$previous_one' AND user_id = '$current_user'");


          $current_user = check_login();
          $id_carrier = check_question_id();
        }

        if (isset($_POST['ideology'])){
          exec_sql_query($myPDO, "INSERT INTO user_question_world_answer (user_id, world_id, question_id, reason) VALUES ('$current_user', '$current_user_world_id', '$id_carrier', 'ideology') ");
        }elseif (isset($_POST['history'])){
          exec_sql_query($myPDO, "INSERT INTO user_question_world_answer (user_id, world_id, question_id, reason) VALUES ('$current_user', '$current_user_world_id', '$id_carrier', 'history') ");
        }elseif (isset($_POST['popularity'])){
          exec_sql_query($myPDO, "INSERT INTO user_question_world_answer (user_id, world_id, question_id, reason) VALUES ('$current_user', '$current_user_world_id', '$id_carrier', 'popularity') ");
        }
      }else{
        global $myPDO;
        $current_user = check_login();
        $previous_one = get_previous_one();
        $id_carrier = check_question_id();
        $current_user_world_id = exec_sql_query($myPDO, "SELECT world FROM user WHERE mturk = '". $current_user. "'")->fetch(PDO::FETCH_ASSOC);
        $current_user_world_id = $current_user_world_id['world'];
        $current_seq = exec_sql_query($myPDO, "SELECT sequential_number FROM user WHERE mturk LIKE '$current_user'")->fetchAll();
        if ($current_seq){
        $current_seq = $current_seq[0]['sequential_number'];
        };
        if (isset($_POST['support'])){
          $user_answer = "support";
          exec_sql_query($myPDO, "UPDATE user_question_world_answer SET user_response = '$user_answer' WHERE question_id = '$previous_one' AND user_id = '$current_user'");

          $current_user = check_login();
          $id_carrier = check_question_id();
        }
        if (isset($_POST['oppose'])){

          $current_seq = exec_sql_query($myPDO, "SELECT sequential_number FROM user WHERE mturk LIKE '$current_user'")->fetchAll();
          $current_seq = $current_seq[0]['sequential_number'] + 1;
          exec_sql_query($myPDO, "UPDATE user SET sequential_number = ('$current_seq') WHERE mturk LIKE '$current_user'");

          $user_answer = "oppose";
          exec_sql_query($myPDO, "UPDATE user_question_world_answer SET user_response = '$user_answer' WHERE question_id = '$previous_one' AND user_id = '$current_user'");

          $current_user = check_login();
          $id_carrier = check_question_id();
        }

        if (isset($_POST['ideology'])){
          exec_sql_query($myPDO, "INSERT INTO user_question_world_answer (user_id, world_id, question_id, reason) VALUES ('$current_user', '$current_user_world_id', '$id_carrier', 'ideology') ");
        }elseif (isset($_POST['history'])){
          exec_sql_query($myPDO, "INSERT INTO user_question_world_answer (user_id, world_id, question_id, reason) VALUES ('$current_user', '$current_user_world_id', '$id_carrier', 'history') ");
        }elseif (isset($_POST['popularity'])){
          exec_sql_query($myPDO, "INSERT INTO user_question_world_answer (user_id, world_id, question_id, reason) VALUES ('$current_user', '$current_user_world_id', '$id_carrier', 'popularity') ");
        }
      }

      $previous_one = get_previous_one();

      $demo_who_support = exec_sql_query($myPDO, "SELECT * FROM user_question_world_answer JOIN user ON user.mturk = user_question_world_answer.user_id WHERE (question_id = '$id_carrier' AND user_political_stand = 'agree' AND world_id = '$current_user_world_id' AND (user.political_stand = 'Democrats' OR user.political_stand = 'strong Democrats'))")->fetchAll();
      $demo_who_oppose = exec_sql_query($myPDO, "SELECT * FROM user_question_world_answer JOIN user ON user.mturk = user_question_world_answer.user_id WHERE (question_id = '$id_carrier' AND user_political_stand = 'disagree' AND world_id = '$current_user_world_id' AND (user.political_stand = 'Democrats' OR user.political_stand = 'strong Democrats'))")->fetchAll();
      $all_demo_in_world = exec_sql_query($myPDO, "SELECT * FROM user_question_world_answer JOIN user ON user.mturk = user_question_world_answer.user_id WHERE (question_id = '$id_carrier' AND world_id = '$current_user_world_id' AND (user_response IS NOT NULL) AND (user.political_stand = 'Democrats' OR user.political_stand = 'strong Democrats'))")->fetchAll();

      var_dump($demo_who_support,$all_demo_in_world);
      $all_demo_in_world = count($all_demo_in_world);

      $demo_who_oppose = count($demo_who_oppose);

      $demo_who_support=count($demo_who_support);

      if($all_demo_in_world == 0){
      $support_rate_of_demo = NULL;
      $oppose_rate_of_demo = NULL;
      }
      else{
      $support_rate_of_demo = $demo_who_support / $all_demo_in_world;
      $oppose_rate_of_demo = $demo_who_oppose / $all_demo_in_world;
      }


      $republican_who_support=exec_sql_query($myPDO, "SELECT * FROM user_question_world_answer JOIN user ON user.mturk = user_question_world_answer.user_id WHERE (question_id = '$id_carrier' AND user_political_stand = 'agree' AND world_id = '$current_user_world_id' AND (user.political_stand = 'Republicans' OR user.political_stand = 'strong Republicans'))")->fetchAll();
      $republican_who_oppose=exec_sql_query($myPDO, "SELECT * FROM user_question_world_answer JOIN user ON user.mturk = user_question_world_answer.user_id WHERE (question_id = '$id_carrier' AND user_political_stand = 'disagree' AND world_id = '$current_user_world_id' AND (user.political_stand = 'Republicans' OR user.political_stand = 'strong Republicans'))")->fetchAll();
      $all_republican_in_world=exec_sql_query($myPDO, "SELECT * FROM user_question_world_answer JOIN user ON user.mturk = user_question_world_answer.user_id WHERE (question_id = '$id_carrier' AND world_id = '$current_user_world_id' AND (user_political_stand IS NOT NULL) AND (user.political_stand = 'Republicans' OR user.political_stand = 'strong Republicans'))")->fetchAll();
      $all_republican_in_world = count($all_republican_in_world);
      $republican_who_support = count($republican_who_support);
      $republican_who_oppose = count($republican_who_oppose);

      if($all_republican_in_world == 0){
      $oppose_rate_of_repub = NULL;
      $support_rate_of_repub = NULL;
      }
      else{
      $support_rate_of_repub = $republican_who_support / $all_republican_in_world;
      $oppose_rate_of_repub = $republican_who_oppose / $all_republican_in_world;
      }

      $support_rate_of_demo_percent = round($support_rate_of_demo * 100, 0);

      $oppose_rate_of_demo_percent = round($oppose_rate_of_demo * 100, 0);

      $support_rate_of_repub_percent = round($support_rate_of_repub * 100, 0);
      $oppose_rate_of_repub_percent = round($oppose_rate_of_repub * 100, 0);

      $support_num_of_demo_percent =count(exec_sql_query($myPDO, "SELECT * FROM user_question_world_answer JOIN user ON user.mturk = user_question_world_answer.user_id WHERE (question_id = '$id_carrier' AND user_political_stand = 'agree' AND  world_id = '$current_user_world_id' AND (user.political_stand = 'Democrats' OR user.political_stand = 'strong Democrats'))")->fetchAll());
      $oppose_num_of_demo_percent =count(exec_sql_query($myPDO, "SELECT * FROM user_question_world_answer JOIN user ON user.mturk = user_question_world_answer.user_id WHERE (question_id = '$id_carrier' AND user_political_stand = 'disagree' AND world_id = '$current_user_world_id' AND (user.political_stand = 'Democrats' OR user.political_stand = 'strong Democrats'))")->fetchAll());

      $support_num_of_repub_percent =count(exec_sql_query($myPDO, "SELECT * FROM user_question_world_answer JOIN user ON user.mturk = user_question_world_answer.user_id WHERE (question_id = '$id_carrier' AND user_political_stand = 'agree'  AND world_id = '$current_user_world_id' AND user.political_stand = 'Republicans')")->fetchAll());
      $oppose_num_of_repub_percent =count(exec_sql_query($myPDO, "SELECT * FROM user_question_world_answer JOIN user ON user.mturk = user_question_world_answer.user_id WHERE (question_id = '$id_carrier' AND user_political_stand = 'disagree'  AND world_id = '$current_user_world_id' AND user.political_stand = 'Republicans')")->fetchAll());


      if (isset($_POST['party_id_continue'])) {
        $user_political = $_POST['political_stand'];
        if ($user_political == 'neither') {
          header('Location: thanks2.php');
        }
        exec_sql_query($myPDO, "UPDATE user SET political_stand = ('$user_political') WHERE mturk = '$current_user'");
      };

      function check_Political(){
        global $current_user;
        global $myPDO;
        $user_political_id = exec_sql_query($myPDO, "SELECT political_stand FROM user WHERE mturk = '$current_user'")->fetchAll();
        if($user_political_id)
        {if ($user_political_id[0]['political_stand'] == "Republicans" or $user_political_id[0]['political_stand'] == "strong Republicans"){
          return "Republican";
        }else{
          return "Democrat";
        };
      }
    };

      if (isset($_POST['yes'])){
        header('Location: yes.php?preference=1');
      }else if(isset($_POST['no'])){
        header('Location: no.php?preference=0');
      }

      $user_political_id=check_Political();

      function get_previous_one(){
        global  $myPDO;
        global $current_user;
        ($current_user);
        if($current_user){
        $records = exec_sql_query($myPDO, "SELECT mturk, question_id_sequence FROM user WHERE mturk='". $current_user. "'")->fetch(PDO::FETCH_ASSOC);
        ($records);
        $records2 = exec_sql_query($myPDO, "SELECT question_id FROM user_question_world_answer  WHERE user_id='". $current_user. "'")->fetchAll();

        $A = explode(",",$records["question_id_sequence"]);
        $B = count($records2);
        if($B>0){
          $C = $A[$B-1];
          exec_sql_query($myPDO, "UPDATE user SET current_question = '". $C. "' WHERE user.mturk = '". $current_user. "'");
          return $C;
        }
        else{
        return null;
      }
      }
    }

    $preference = null;
    if($preference != null){
      exec_sql_query($myPDO, "UPDATE user_question_world_answer SET user_yes_no = '$preference' WHERE user_id = '$current_user' AND question_id = '$id_carrier'");
    }
    $num_of_users = count(exec_sql_query($myPDO, "SELECT * FROM user")->fetchAll());
    if($id_carrier == 25){
      header('Location: thanks.php');
    }


    $email;$comment;$captcha;
    if(isset($_POST['g-recaptcha-response'])){
      $captcha=$_POST['g-recaptcha-response'];
    if(!$captcha){
      echo '<h2>Please check the the captcha form.</h2>';
      exit;
    }

    $secretKey = "6LffU3AUAAAAANsnakR3xxOfz7k_uRG3hkvQv5Yh";
    $ip = $_SERVER['REMOTE_ADDR'];
    $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
    $responseKeys = json_decode($response,true);
    if(intval($responseKeys["success"]) !== 1) {
      echo '<h2>You are spammer! </h2>';
      }
    }

    if(isset($_POST['user_response'])&&isset($_POST['user_time'])){
    $user_response = $_POST['user_response'];
    $user_time = $_POST['user_time'];
    // var_dump($current_user,$id_carrier,$user_response,$user_time);
    exec_sql_query($myPDO, "UPDATE user_question_world_answer SET user_response = '$user_response' WHERE user_id = '$current_user' AND question_id = '$previous_one'");
    exec_sql_query($myPDO, "UPDATE user_question_world_answer SET user_time_spent = '$user_time' WHERE user_id = '$current_user' AND question_id = '$previous_one'");
    $current_user = check_login();
    $id_carrier = get_previous_one();
    }

    if(isset($_POST['user_response_agreement'])&&isset($_POST['user_time_agreement'])){
    $user_response = $_POST['user_response_agreement'];
    $current_time =  exec_sql_query($myPDO, "SELECT user_time_spent FROM user_question_world_answer WHERE user_id = '$current_user' AND question_id = '$previous_one'")->fetchAll();

    $user_time = (float)$_POST['user_time_agreement']+(float)$current_time;
    // var_dump($current_time,$current_user,$previous_one,$user_response,$user_time);
    exec_sql_query($myPDO, "UPDATE user_question_world_answer SET user_political_stand = '$user_response' WHERE user_id = '$current_user' AND question_id = '$previous_one'");
    exec_sql_query($myPDO, "UPDATE user_question_world_answer SET user_time_spent = '$user_time' WHERE user_id = '$current_user' AND question_id = '$previous_one'");
    $current_user = check_login();
    $id_carrier = check_question_id();
    }


    $records2 = exec_sql_query($myPDO, "SELECT question_id FROM user_question_world_answer  WHERE user_id='". $current_user. "'")->fetchAll();
    $current_seq_by_count = COUNT($records2);

?>
