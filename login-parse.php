<?php
//re-create the session if the cookie still validate
if($_COOKIE['loggedin']){
  $_SESSION['loggedin'] = 1;
}

//logout action below session outsie of parse
if($_GET['action'] == 'logout'){
  //close session and the associated cookie this snippet is from php.net
  if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}//end snipet
  session_destroy();
  //erase all session Var
  $_SESSION['user_id'] = false;
  //unset all cookie '' false or empty string set the time in past
  setcookie('user_id', '', time() - 999999);

  $_SESSION['secret_key'] = false;
  //unset all cookie '' false or empty string set the time in past secret_key
  setcookie('secret_key', '', time() - 999999);
}//end logout action

//if the form was submitted, parse it
if($_POST['did_login']){
  //extract the data
  $username = clean_string($_POST['username']);//clean and match the name='username'
  $password = clean_string($_POST['password']);//clean match the name='password'

  //todo: validate the data
  $valid = true;
  if($username == '' OR strlen($username > 40)){
    $valid = false;
    $errors['username'] = 'Username is the wrong length';
  }

  if(strlen($password) < 8){
    $valid = false;
    $errors['password'] = 'Password too short';
  }

  //if valid check the credential against the data base
  if($valid){
    $password = sha1($password . SALT);
    $query = "SELECT user_id
              FROM users
              WHERE username = '$username'
              AND password = '$password'
              LIMIT 1 ";
    $result = $db->query($query);

  //send the user to teh secret page if they got it right, or show an error
  if($result->num_rows == 1){
      //success remember the user and then redirect to secret page use location:
    $secret_key = sha1(microtime() . SALT);//security sha1. microtime SALT

    $row = $result->fetch_assoc(); // grap the result and show the one row
    $user_id = $row['user_id'];
    //store the key in data because//the user_id is int or number no need single quote
    $query = "UPDATE users
              SET secret_key = '$secret_key'
              WHERE user_id = $user_id
              LIMIT 1 ";

    $result = $db->query($query);

    //make sure the query works
    if($db->affected_rows == 1){
      //use them both to make the user experience
      setcookie('secret_key', $secret_key, time() + (60*60*24));
      $_SESSION['secret_key'] = $secret_key;

      setcookie('user_id', $user_id, time() + (60*60*24));
      $_SESSION['user_id'] = $user_id;

      header('location:admin-index.php');//direct link to admin file path
    }//end if affected rows
    else{
      $error_message = 'No rows affected';
    }

  }else{
    //error show feedback
    $error_message = 'Sorry, your username/password combo is incorrect. Try again.';
  }
}//end if valid
else{
  $error_message = 'Sorry, your username/password combo is incorrect. Try again.';
}
}//end log in parse
